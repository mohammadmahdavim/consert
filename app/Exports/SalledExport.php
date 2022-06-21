<?php

namespace App\Exports;


use App\Models\Salled;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SalledExport implements FromCollection, WithHeadings, WithMapping
{
    protected $request;

    function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $request = $this->request;

        return  Salled::
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
            ->when($request->filled('program_id'), function ($program_id) use ($request) {
                $program_id->whereIn('program_id', $request->program_id);
            })
            ->when($request->filled('sans_id'), function ($sans_id) use ($request) {

                $sans_id->whereIn('sans_id', $request->sans_id);
            })
            ->when($request->filled('status'), function ($status) use ($request) {
                $status->where('status', $request->status);
            })
            ->whereHas('user', function ($user) use ($request) {
                $user->when($request->filled('name'), function ($name) use ($request) {
                    $name->where('name', 'like', '%' . $request->input('name') . '%');
                })
                    ->when($request->filled('mobile'), function ($mobile) use ($request) {
                        $mobile->where('mobile', $request->input('mobile'));
                    });
            })
            ->get();
    }

    public function headings(): array
    {
        return [
            'خریدار',
            'موبایل',
            'برنامه',
            'سانس',
            'تعداد بلیت',
            'پرداخت شده',
            'کد پیگیری',
            'وضعیت',
        ];
    }

    public function map($preflight): array
    {

        return [
            $preflight->user->name,
            $preflight->user->mobile,
            $preflight->program->name,
            $preflight->sans->date . ' ' . $preflight->sans->time,
            $preflight->count,
            $preflight->price,
            $preflight->code,
            $preflight->status,
        ];

    }


}
