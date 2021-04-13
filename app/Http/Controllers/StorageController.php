<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;

class StorageController extends Controller
{
    public function index()
    {
        return view('home');
    }

    function store(Request $request)
    {
        $name=$request->file('file')->getClientOriginalName();
        $uploaddir = storage_path().'/app/storage/';
        $uploadfile = $uploaddir . $name;

        $file = new File();
        $file->name= $name;
        $file->path= $uploadfile;
        $file->ownername= $request->user()->name;
        $file->save();

        if(move_uploaded_file($request->file('file'), $uploadfile))
        {
            session(['status' => 'Upload Successfull']);
            $request->session()->now('status', 'Task was successful!');
            return redirect('/home')->with('status',$uploadfile);
            //return view('home');
        }
        else
            return redirect('/home')->with('status',$uploadfile);

    }
}
