<?php

namespace App\Http\Controllers;


use App\Models\Gateway;
use App\Models\Payment;
use App\Models\Salled;
use App\Models\SansChair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function checkout(Request $request, $token)
    {
        $payment = Payment::where('token', $token)

            ->where('status', 'waiting')
            ->first();

        if ($payment) {
            $verify = Gateway::verify($token);
            if ($verify) {
                $salled = Salled::where('token', $token)->where('user_id', $payment->user_id)->first();
                $salled->update(['status' => 'success']);

                $chairs = DB::table('salled_sans_chair')->where('salled_id', $salled->id)->get();

                foreach ($chairs as $chair) {
                    $code = rand(100000000, 999999999);

                    for ($x = 0; $x <= 10000; $x++) {
                        $chairExite = DB::table('salled_sans_chair')->where('code', $code)->first();
                        if (!$chairExite) {
                            break;
                        }
                    }
                    DB::table('salled_sans_chair')
                        ->where('id', $chair->id)
                        ->update(array('code' => $code));
                    \App\lib\Kavenegar::sendSMS($salled->user->mobile, $code, 'VerifyMobileMarket');

                }
                SansChair::where('sans_id', $salled->sans_id)->whereIn('id', $chairs->pluck('sans_chair_id'))->update(['status' => 3]);

                return redirect('/ticket/code/' . $salled->code);
            }
            alert()->warning('عملیات پرداخت ناموفق بود. درصورت کسر پول ظرف 72 ساعت به حساب شما باز خواهد گشت.');
            return redirect('/');
        }

        abort(404);
    }
}
