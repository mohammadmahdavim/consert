<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\PlaneChair;
use App\Models\PlaneSalon;
use App\Models\Program;
use App\Models\Salon;
use App\Models\Sans;
use App\Models\SansChair;
use App\Services\ChairService;
use Illuminate\Http\Request;

class SansController extends Controller
{

    public $chairService;

    public function __construct(ChairService $chairService)
    {
        $this->chairService = $chairService;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rows = Sans::where('program_id', $id)->orderBy('created_at','desc')->get();

        return view('panel.sans.index', ['rows' => $rows, 'id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $salons = Salon::all();

        return view('panel.sans.create', ['id' => $id, 'salons' => $salons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = Sans::create([
            'program_id' => $request->program_id,
            'salon_id' => $request->salon_id,
            'date' => $request->date,
            'time' => $request->time,
            'active' => $request->active,
        ])->id;

        $chairs = PlaneChair::where('salon_id', $request->salon_id)->get();
        foreach ($chairs as $chair) {
            SansChair::create([
                'sans_id' => $row,
                'salon_id' => $chair->salon_id,
                'plane_salon_id' => $chair->plane_salon_id,
                'plane_chair_row_id' => $chair->plane_chair_row_id,
                'name' => $chair->name,
                'status' => $chair->status,
                'price' => $chair->price,
            ]);
        }
        alert()->success('سانس با موفقیت ایجاد گردید.', 'موفق');
        return redirect('/panel/sans/' . $request->program_id);
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
        $row = Sans::find($id);
        $salons = Salon::all();

        return view('panel.sans.edit', ['row' => $row, 'salons' => $salons]);

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
        $row = Sans::find($id);

        $row->update([
            'salon_id' => $request->salon_id,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        alert()->success('سانس با موفقیت ویرایش گردید.', 'موفق');
        return redirect('/panel/sans/' . $row->program_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Sans::find($id);
        $chairs = SansChair::where('sans_id', $row->id)->get();
        foreach ($chairs as $chair) {
            $chair->delete();
        }
        $row->delete();
    }

    public function changeStatus(Request $request)
    {
        $karnameh = Sans::find($request->id);
        $karnameh->active = $request->active;
        $karnameh->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function plane($id)
    {
        $sans=Sans::find($id);
        $rows = PlaneSalon::where('salon_id', $sans->salon_id)->get();
        return view('panel.sans.plane.index', ['rows' => $rows, 'sans' => $sans]);
    }

    public function chair($id,$sans)
    {
        $plane = PlaneSalon::where('id', $id)
            ->with([
                'chairRow.chairSans' => function ($query) use($sans) {
                    $query->where('sans_id',$sans);
                },
                'chairRow' => function ($query) {
                    $query->orderBy('row');
                },
            ])
            ->first();

        return view('panel.sans.plane.chair.index', ['plane' => $plane,'sans'=>$sans]);
    }

    public function chairUpdateRow(Request $request)
    {
        if (!$request->chair)
        {
            alert()->warning('ناموفق','صندلی انتخاب نکردید.');
            return back();
        }
        $chairs = $this->chairService->chair($request->chair);
        foreach ($chairs as $chair) {
            $chair = SansChair::where('id', $chair)->first();
            $chair->update(['status' => $request->active, 'price' => $request->price]);
        }
        alert()->success('عملیات انجام شد.', 'موفق');
        return back();
    }
}
