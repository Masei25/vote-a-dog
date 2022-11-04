<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of all submitted dogs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::all();

        return view('index', ['pictures' => $pictures]);
    }

    /**
     * Show the form for uploading a new dog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Handle the form submission and save the uploaded dog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // See PictureControllerTest to see what this should do
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $dir = 'storage/';
        !file_exists(File::makeDirectory($dir, $mode =0777, true, true));

        //Generate random name 
        $fileName = Str::random(15);

        $picture = $request->file('picture')->getClientOriginalExtension();
        $picture = $fileName.'.'.$picture;

        $request->file('picture')->move(public_path($dir), $picture);

        Picture::create([
            'name' => $request->name,
            'file_path' => $picture ?? '',
        ]);

        return redirect()->route('index')->with('message', 'File Uploaded Successfully');
        
    }

    /**
     * Upvote a dog by ID
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upvote(Request $request, Picture $picture)
    {
        $picture_detail = Picture::find($picture->id);

        if($picture_detail) {
            $picture_detail->update(['votes' => $picture_detail->votes + 1]);
        }

        return redirect()->route('index')->with('message', 'Voted');

    }
}
