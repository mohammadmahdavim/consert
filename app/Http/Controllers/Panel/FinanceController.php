<?php

namespace App\Http\Controllers\Panel;

use App\Exports\SalledExport;
use App\Exports\StudentExport;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Salled;
use App\Models\Sans;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Morilog\Jalali\Jalalian;

class FinanceController extends Controller
{

    public function salled(Request $request)
    {
        $rows = Salled::
        with([
            'sans' => function ($school) {
                return $school->select('id', 'date', 'time');
            },
            'program' => function ($school) {
                return $school->select('id', 'name');
            },
            'user' => function ($school) {
                return $school->select('id', 'name', 'mobile');
            },
        ])
            ->when($request->filled('code'), function ($code) use ($request) {
                $code->where('code', $request->code);
            })
            ->when($request->filled('count'), function ($count) use ($request) {
                $count->where('count', $request->count);
            })
            ->when($request->filled('price'), function ($price) use ($request) {
                $price->where('price', $request->price);
            })
            ->when($request->filled('status'), function ($status) use ($request) {
                $status->where('status', $request->status);
            })
            ->when($request->filled('program_id'), function ($program_id) use ($request) {
                $program_id->whereIn('program_id', $request->program_id);
            })
            ->when($request->filled('sans_id'), function ($sans_id) use ($request) {

                $sans_id->whereIn('sans_id', $request->sans_id);
            })
            ->whereHas('user', function ($user) use ($request) {
                $user->when($request->filled('name'), function ($name) use ($request) {
                    $name->where('name', 'like', '%' . $request->input('name') . '%');
                })
                    ->when($request->filled('mobile'), function ($mobile) use ($request) {
                        $mobile->where('mobile', $request->input('mobile'));
                    });
            })
            ->paginate(25);
        $programs = Program::select('id', 'name')->get();
        $sanses = Sans::select('id', 'date', 'time')->get();
        return view('panel.finance.salled', ['rows' => $rows, 'programs' => $programs, 'sanses' => $sanses]);
    }

    public function sans(Request $request, $id)
    {
        $request['sans_id'] = [$id];
        $rows = Salled::where('sans_id', $id)
            ->with([
                'sans' => function ($school) {
                    return $school->select('id', 'date', 'time');
                },
                'program' => function ($school) {
                    return $school->select('id', 'name');
                },
                'user' => function ($school) {
                    return $school->select('id', 'name', 'mobile');
                },
            ])
            ->when($request->filled('status'), function ($status) use ($request) {
                $status->where('status', $request->status);
            })
            ->when($request->filled('code'), function ($code) use ($request) {
                $code->where('code', $request->code);
            })
            ->when($request->filled('count'), function ($count) use ($request) {
                $count->where('count', $request->count);
            })
            ->when($request->filled('price'), function ($price) use ($request) {
                $price->where('price', $request->price);
            })
            ->when($request->filled('program_id'), function ($program_id) use ($request) {
                $program_id->whereIn('program_id', $request->program_id);
            })
            ->when($request->filled('sans_id'), function ($sans_id) use ($request) {

                $sans_id->whereIn('sans_id', $request->sans_id);
            })
            ->whereHas('user', function ($user) use ($request) {
                $user->when($request->filled('name'), function ($name) use ($request) {
                    $name->where('name', 'like', '%' . $request->input('name') . '%');
                })
                    ->when($request->filled('mobile'), function ($mobile) use ($request) {
                        $mobile->where('mobile', $request->input('mobile'));
                    });
            })
            ->paginate(25);
        $programs = Program::select('id', 'name')->get();
        $sanses = Sans::select('id', 'date', 'time')->get();


        return view('panel.finance.salled', ['rows' => $rows, 'programs' => $programs, 'sanses' => $sanses]);
    }

    public function chair($id)
    {
        $row = Salled::where('id', $id)->with('chair')->first();
        return view('panel.finance.modal.chair', ['row' => $row,])->render();
    }

    public function export(Request $request)

    {
        $date = Jalalian::now()->format('Y-m-d');
        return Excel::download(new SalledExport($request), $date . 'finance.xlsx');
    }

}
