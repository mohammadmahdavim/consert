<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Morilog\Jalali\Jalalian;


class PanelController extends Controller
{

    public function index()
    {

        return view('panel.index');
    }

    public function scan()
    {
        return view('panel.scan');
    }

    public function scancheck($id)
    {
        $exite = DB::table('salled_sans_chair')->where('code', $id)->where('check', 0)->first();
        $duplicate = DB::table('salled_sans_chair')->where('code', $id)->where('check', 1)->first();
        if ($duplicate) {
            return Response::json('duplicate');
        }
        if ($exite) {
            DB::table('salled_sans_chair')
                ->where('code', $id)
                ->update(['check' => 1]);
            return Response::json('ok');

        } else {
            return Response::json('no');

        }
    }

}
