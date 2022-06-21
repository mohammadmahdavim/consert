<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\PlaneChair;
use App\Models\PlaneChairRow;
use App\Models\PlaneSalon;
use App\Services\ChairService;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    public $chairService;

    public function __construct(ChairService $chairService)
    {
        $this->chairService = $chairService;

    }

    public function index($id)
    {
        $plane = PlaneSalon::where('id', $id)
            ->with('chairRow.chair')
            ->with([
                'chairRow' => function ($query) {
                    $query->orderBy('row');
                },
            ])
            ->first();

        return view('panel.plane.chair.index', ['plane' => $plane]);
    }

    public function storeRow(Request $request)
    {
        $row = PlaneChairRow::create([
            'salon_id' => $request->salon_id,
            'plane_salon_id' => $request->plane_salon_id,
            'name' => $request->name,
            'row' => $request->row,
            'start' => $request->start,
            'count' => $request->count,
        ])->id;

        for ($x = $request->start; $x < $request->count + $request->start; $x++) {
            PlaneChair::create([
                'salon_id' => $request->salon_id,
                'plane_salon_id' => $request->plane_salon_id,
                'plane_chair_row_id' => $row,
                'name' => $x,
                'status' => 1,
                'price' => 140000,
            ]);
        }
        alert()->success('ردیف موفقیت ایجاد گردید.', 'موفق');
        return back();
    }


    public function deleteRow($id)
    {
        $row = PlaneChairRow::find($id);
        $row->delete();
    }


    public function chairUpdateRow(Request $request)
    {
        if (!$request->chair) {
            alert()->warning('ناموفق', 'صندلی انتخاب نکردید.');
            return back();
        }
        $chairs = $this->chairService->chair($request->chair);
        $planeChairRowId = [];
        $plane_chair_row_id = 0;
        foreach ($chairs as $chair) {
            $chair = PlaneChair::where('id', $chair)->first();
            if ($plane_chair_row_id != $chair->plane_chair_row_id) {
                $plane_chair_row_id = $chair->plane_chair_row_id;
                $planeChairRowId[] = $plane_chair_row_id;
            }

            $chair->update(['status' => $request->active, 'price' => $request->price]);
        }
        foreach ($planeChairRowId as $planeChairRow) {
            $start = PlaneChair::where('plane_chair_row_id', $planeChairRow)
                ->where('status', 1)
                ->orderby('name')
                ->pluck('name')
                ->first();
            $charis = PlaneChair::where('plane_chair_row_id', $planeChairRow)
                ->where('status', 1)
                ->orderby('name')
                ->get();
            foreach ($charis as $chair) {
                $chair->update(['name' => $start]);
                $start = $start + 1;
            }

        }

        alert()->success('عملیات انجام شد.', 'موفق');
        return back();
    }

}
