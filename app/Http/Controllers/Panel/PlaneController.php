<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\PlaneSalon;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rows = PlaneSalon::where('salon_id',$id)->get();
        return view('panel.plane.index', ['rows' => $rows,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('panel.plane.create',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        PlaneSalon::create([
            'salon_id' => $request->salon_id,
            'floor' => $request->floor,
            'position' => $request->position,
            'row' => $request->row,
            'name' => $request->name,
            'countChair' => $request->countChair,
            'direction' => $request->direction,
        ]);

        alert()->success('بخش با موفقیت ایجاد گردید.', 'موفق');
        return redirect('/panel/plane/'.$request->salon_id);
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
        $row = PlaneSalon::find($id);
        return view('panel.plane.edit', ['row' => $row]);

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
        $row = PlaneSalon::find($id);

        $row->update([
            'floor' => $request->floor,
            'position' => $request->position,
            'row' => $request->row,
            'countChair' => $request->countChair,
            'direction' => $request->direction,
            'name' => $request->name,
        ]);

        alert()->success('بخش با موفقیت ویرایش گردید.', 'موفق');
        return redirect('/panel/plane/'.$row->salon_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $row = PlaneSalon::find($id);
        $row->delete();
    }

    public function changeStatus(Request $request)
    {
        $karnameh = PlaneSalon::find($request->id);
        $karnameh->active = $request->active;
        $karnameh->save();

        return response()->json(['success' => 'Status change successfully.']);
    }


}
