<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\PlaneSalon;
use App\Models\Salon;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Salon::orderBy('created_at','desc')->get();
        return view('panel.salon.index', ['rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.salon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $salon= Salon::create([
            'name' => $request->name,
            'address' => $request->address,
            'type_chair' => $request->type_chair,
        ]);
        PlaneSalon::create([
            'salon_id' => $salon->id,
            'floor' => 1,
            'name' => 'همکف',
        ]);
        PlaneSalon::create([
            'salon_id' => $salon->id,
            'floor' => 2,
            'name' => 'بالکن',
        ]);
        alert()->success('سالن با موفقیت ایجاد گردید.', 'موفق');
        return redirect('/panel/salon');
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
        $row = Salon::find($id);
        return view('panel.salon.edit', ['row' => $row]);

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
        $row = Salon::find($id);

        $row->update([
            'name' => $request->name,
            'address' => $request->address,
            'type_chair' => $request->type_chair,
        ]);

        alert()->success('سالن با موفقیت ویرایش گردید.', 'موفق');
        return redirect('/panel/salon');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Salon::find($id);
        $row->delete();
    }

    public function changeStatus(Request $request)
    {
        $karnameh = Salon::find($request->id);
        $karnameh->active = $request->active;
        $karnameh->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
