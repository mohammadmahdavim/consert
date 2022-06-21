<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rows = Program::with('controller.user')->with('organizer.user')->orderBy('created_at','desc')->get();

        return view('panel.program.index', ['rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('panel.program.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Program::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'type' => $request->type,
            'director' => $request->director,
            'period' => $request->period,
            'time' => $request->time,
            'textTicket' => $request->textTicket,
            'publish' => $request->publish,
            'start' => $request->start,
            'description' => $request->description,
            'start_time' => $request->start_time,
        ]);

        alert()->success('برنامه با موفقیت ایجاد گردید.', 'موفق');
        return redirect('/panel/program');
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
        $row = Program::find($id);
        $users=User::all();

        return view('panel.program.edit', ['row' => $row,'users'=>$users]);

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

        $row = Program::find($id);

        $row->update([
            'name' => $request->name,
            'director' => $request->director,
            'period' => $request->period,
            'time' => $request->time,
            'textTicket' => $request->textTicket,
            'publish' => $request->publish,
            'start' => $request->start,
            'start_time' => $request->start_time,
            'description' => $request->description,
            'type' => $request->type,

        ]);

        alert()->success('برنامه با موفقیت ویرایش گردید.', 'موفق');
        return redirect('/panel/program');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Program::find($id);
        $row->delete();
    }

    public function changeStatus(Request $request)
    {
        $karnameh = Program::find($request->id);
        $karnameh->active = $request->active;
        $karnameh->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
