<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;

class StorageController extends Controller
{
    public function index() {
        return view('home');
    }

    function store (Request $request) {
        $name = $request->file('file')->getClientOriginalName();
        $uploaddir = public_path() . '/storage/';

        $uploadfile = $uploaddir . $name;

        $file = new File();
        $file->name = $name;
        $file->path = $uploadfile;
        $file->ownername = $request->user()->name;
        $file->save();

        if (move_uploaded_file($request->file('file'), $uploadfile)) {
            session(['status' => 'Upload Successfull']);
            $request->session()->now('status', 'Task was successful!');

            return view('/home')->with('status', $uploadfile);
        } else {
            return view('/home')->with('status', $uploadfile);
        }
    }

    function delete(Request $request) {
        $id = $request->id;
        $file = File::where("id", $id)->first();

        if (unlink($file->path))
            File::where("id", $id)->delete();

        $files = File::where('ownername', session('user'))->get();

        return view('home', ['files' => $files]);
    }
}
