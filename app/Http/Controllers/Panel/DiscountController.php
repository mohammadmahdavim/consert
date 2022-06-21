<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Sans;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rows = Discount::where('sans_id', $id)->get();

        return view('panel.discount.index', ['rows' => $rows, 'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('panel.discount.create', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = $this->generateRandomString();
        Discount::create([
            'sans_id' => $request->sans_id,
            'code' => $code,
            'count' => $request->count,
            'type' => $request->type,
            'value' => $request->value,
            'if' => $request->if,
            'used' => 0,
            'active' => $request->active,

        ]);

        alert()->success('کد تخفیف با موفقیت ایجاد گردید.', 'موفق');
        return redirect('/panel/discount/' . $request->sans_id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Discount::find($id);

        return view('panel.discount.edit', ['row' => $row]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = Discount::find($id);

        $row->update([
            'count' => $request->count,
            'type' => $request->type,
            'value' => $request->value,
            'if' => $request->if,
        ]);

        alert()->success('کد تخفیف با موفقیت ویرایش گردید.', 'موفق');
        return redirect('/panel/discount/' . $row->sans_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Discount::find($id);
        $row->delete();
    }

    public function changeStatus(Request $request)
    {
        $karnameh = Discount::find($request->id);
        $karnameh->active = $request->active;
        $karnameh->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    function generateRandomString()
    {
        $randomString = substr(md5(mt_rand()), 0, 7);
        for ($x = 0; $x < 1000; $x++) {
            $exite = Discount::where('code', $randomString)->first();
            if (!$exite) {
                break;
            }
        }
        return $randomString;
    }
}
