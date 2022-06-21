<?php

namespace App\Http\Controllers;

use App\lib\EnConverter;
use App\Models\Discount;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Validator;
use Kavenegar;
use App\Models\Gateway;
use App\Models\Image;
use App\Models\Payment;
use App\Models\PlaneSalon;
use App\Models\Program;
use App\Models\Salled;
use App\Models\Sans;
use App\Models\SansChair;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;


class HomeController extends Controller
{
    /**
     *
     * /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('active', 1)->get();
        $programs = Program::where('active', 1)
            ->where('publish', '<=', Jalalian::now()->format('Y/m/d'))
            ->with([
                'image' => function ($query) {
                    $query->orderBy('created_at');
                },
            ])
            ->get();

        return view('home2.index', ['sliders' => $sliders, 'programs' => $programs]);
    }

    public function single($sans)
    {
        $sans = Sans::where('id', $sans)->first();
        $images = Image::where('program_id', $sans->program_id)->get();
        $rows = PlaneSalon::where('salon_id', $sans->salon_id)->where('active',1)->get();

        return view('home2.single', ['images' => $images, 'rows' => $rows, 'sans' => $sans]);
    }

    public function contact()
    {


        return view('home2.contact');
    }

    public function sansModal($id)
    {
        $program = Program::where('id', $id)
            ->with([
                'sans' => function ($query) {
                    $query->orderBy('date', 'asc')->orderBy('time', 'asc');
                },
            ])->first();

        return view('home2.sans', ['program' => $program]);

    }

    public function chair($id, $sans)
    {

        $plane = PlaneSalon::where('id', $id)
            ->with([
                'chairRow.chairSans' => function ($query) use ($sans) {
                    $query->where('sans_id', $sans);
                },
                'chairRow' => function ($query) {
                    $query->orderBy('row');
                },
            ])
            ->first();
//return $plane;
        return view('home2.chair', ['plane' => $plane, 'sans' => $sans]);
    }

    public function ticket(Request $request)
    {
        if (!$request->chair) {
            alert()->warning('ناموفق', 'صندلی انتخاب نکردید.');
            return back();
        }
        SansChair::where('sans_id', $request->sans)->whereIn('id', $request->chair)->update(['status' => 4]);

        $chairs = SansChair::where('sans_id', $request->sans)
            ->whereNOtIn('status', [3])
            ->whereIN('status', ['4'])
            ->whereIn('id', $request->chair)
            ->with('row')
            ->with('plane')
            ->with('salon')
            ->get();

        $sans = Sans::where('id', $request->sans)->first();
        $images = Image::where('program_id', $sans->program_id)->get();
        $request = json_encode($request->all());

        return view('home2.cart', ['chairs' => $chairs, 'sans' => $sans, 'images' => $images, 'request' => $request]);
    }

    public function pay(Request $request)
    {

        $this->validate($request, [
            'captcha' => 'required|captcha',
            'mobile' => 'required|digits:11|regex:/(09)[0-9]{9}/',
            'name' => 'required'
        ]);


        # for change persian charakter
        $request->merge([
            'price' => EnConverter::bn2en($request->price),
        ]);

//return $request;
        $gateway = Gateway::active()->where('id', $request->gateway_id)->first();
        if (!$gateway) {
            return response()->json([
                'message' => 'درگاه انتخاب شده معتبر نمی باشد.'
            ], 400);
        }

        if ($request->price > 100) {
            $user = User::where('mobile', $request->mobile)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $request->name,
                    'mobile' =>EnConverter::bn2en($request->mobile),
                    'national_code' => EnConverter::bn2en($request->mobile),
                    'active' => 1,
                    'role' => 'user',
                ]);
            }


            $code = rand(100000000, 999999999);
            $token = Str::random(50);

            for ($x = 0; $x <= 10000; $x++) {
                $salledExite = Salled::where('code', $code)->first();
                if (!$salledExite) {
                    break;
                }
            }

            $salled = Salled::create([
                'user_id' => $user->id,
                'program_id' => $request->program_id,
                'sans_id' => $request->sans_id,
                'count' => $request->count,
                'price' => $request->price,
                'code' => $code,
                'token' => $token,
                'status' => 'waiting',
            ]);

            $salled->chair()->sync(json_decode($request->chair));
            $price = 0;
            foreach ($salled->chair as $chair) {
                $price = $price + $chair->price;
            }
            $price = $price * 1.09;
            $result = $this->getDiscount($request->discount_value, $request->sans_id, $request->count);
            $price = ($price * (100 - $result['percent'])) / 100;
            Payment::create([
                'user_id' => $user->id,
                'amount' => $price,
                'gateway_id' => $gateway->id,
                'token' => $token,
                'date' => time(),
                'trans_id' => null,
                'id_get' => null,
                'type' => 'online',
                'status' => 'waiting',
//                'ip' => 2,
            ]);

            $payment = Gateway::payment($gateway->id, $token);
            $payment = $payment->getData();
            if ($payment->status == 200) {
                return response()->json([
                    'url' => $payment->url,
                    'message' => 'ok'
                ], 200);
            }

            return response()->json([
                'message' => 'ارتباط با بانک برقرار نمی باشد. بعدا تلاش کنید!'
            ], 400);
        }

        return response()->json([
            'message' => 'مبلغ باید بیش از 100 تومان باشد.'
        ], 400);
    }

    public function code($code)
    {
        $salled = Salled::where('code', $code)
            ->with('chair')
            ->with('chair.row')
            ->with('chair.plane')
            ->with('chair.salon')
            ->with('chair.sans.program')
            ->with('user')
            ->first();

        return view('home2.ticket', ['salled' => $salled]);
    }

    public function search(Request $request)
    {
        $salledId = 1;
        $chairExite = DB::table('salled_sans_chair')->where('code', $request->code)->first();
        if ($chairExite) {
            $salledId = $chairExite->salled_id;
        }
        $salled = Salled::where('id', $salledId)
            ->with('chair.row')
            ->with('chair.plane')
            ->with('chair.salon')
            ->with('chair.sans.program')
            ->with([
                'chair' => function ($school) use ($request) {
                    return $school->where('code', $request->code);
                },
            ])
            ->first();
        return view('home2.ticket', ['salled' => $salled]);
    }

    public function searchform()
    {
        return view('home2.search');
    }

    public function discount($code, $sans, $count)
    {
        $result = $this->getDiscount($code, $sans, $count);
        if ($result['status'] == 'ok') {
            $discount = Discount::where('sans_id', $sans)->where('code', $code)
                ->first();
            $discount->update(['used' => $discount->used + 1]);
        }
        return Response::json($result);

    }

    public function getDiscount($code, $sans, $count)
    {
        $discount = Discount::where('sans_id', $sans)->where('code', $code)
            ->first();

        if ($discount) {
            if ($discount->active == 0) {
                $result = array('status' => 'no', 'message' => 'کد تخفیف غیر فعال می باشد.', 'percent' => '0');
            } elseif ($discount->count <= $discount->used) {
                $result = array('status' => 'no', 'message' => 'تعداد استفاده از کد تخفیف به اتمام رسیده است', 'percent' => '0');
            } elseif ($count < $discount->if) {
                $result = array('status' => 'no', 'message' => 'حداقل تعداد بلیط را رعایت نکردید', 'percent' => '0');
            } else {
                $result = array('status' => 'ok', 'message' => 'کد تخفیف معتبر', 'percent' => $discount->value);
            }
        } else {
            $result = array('status' => 'no', 'message' => 'کد تخفیف نامعتبر', 'percent' => '0');
        }
        return $result;
    }

    public function law()
    {
        return view('home2.law');

    }


}
