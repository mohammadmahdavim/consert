<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Notif;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $rows = Notif::orderBy('active', 'desc')->orderBy('created_at', 'desc')->with('type')->with('user')->paginate(20);

        return view('panel.notification.index', ['rows' => $rows]);
    }

    public function changeStatus($id, $status)
    {
        $pattern = Notif::find($id);
        $pattern->active = $status;
        $pattern->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
