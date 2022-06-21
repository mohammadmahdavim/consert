<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $type_id)
    {
        $rows = Image::where('program_id', $id)->where('type', $type_id)->get();
        if ($type_id == 1) {
            $type = 'تصاویر';
        } elseif ($type_id == 2) {
            $type = 'چهره ها';
        } else {
            $type = 'مجوزها';

        }
        return view('panel.image.index', ['rows' => $rows, 'id' => $id, 'type' => $type,'type_id'=>$type_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $type)
    {

        return view('panel.image.create', ['id' => $id, 'type' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('file');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/images/'.$filename);
        \Intervention\Image\Facades\Image::make($image->getRealPath())->resize(800, 534)->save($path);

//        \Intervention\Image\Facades\Image::make($image->getRealPath())->save($path);
        $mime = $image->getClientMimeType();
        $original_filename = $image->getClientOriginalName();
        Image::create([
            'program_id' => $request->id,
            'type' => $request->type,
            'mime' => $mime,
            'originalFilename' => $original_filename,
            'filename' => $filename,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $row = Image::find($id);
        $row->delete();
    }


}
