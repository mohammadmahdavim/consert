<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Slider::orderBy('created_at','desc')->get();
        return view('panel.slider.index', ['rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        return view('panel.slider.create', ['programs' => $programs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),
            [
                'file' => 'mimes:jpg,bmp,png,docx',
                'program_id' => 'required',
                'title' => 'required',
            ]
        );
        $image = $request->file('file');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/file/' . $filename);
        Image::make($image->getRealPath())->resize(1920, 1062)->save($path);
//        $image->move($path, $filename);
        $mime = $image->getClientMimeType();
        $original_filename = $image->getClientOriginalName();

        Slider::create([
            'title' => $request->title,
            'program_id' => $request->program_id,
            'mime' => $mime,
            'originalFilename' => $original_filename,
            'resizeImage' => $filename,
            'filename' => $filename,
        ]);

        alert()->success('اسلایدر با موفقیت ایجاد گردید.', 'موفق');
        return redirect('/panel/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $row = Slider::find($id);
        $row->delete();
    }

    public function changeStatus(Request $request)
    {
        $karnameh = Slider::find($request->id);
        $karnameh->active = $request->active;
        $karnameh->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

}
