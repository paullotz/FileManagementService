<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

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
        $file->ispublic = false;
        $file->save();

        echo move_uploaded_file($request->file('file'), $uploadfile);

        dd($uploadfile);

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

        return redirect('/home');
    }

    function download(Request $request) {

        $id = $request->id;

        $file = File::where("id", $id)->first();

        return response()->download($file->path);

        /*

        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file->name).'"');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: 0");
        header('Content-Length: ' . filesize($file->path));
        header('Pragma: public');


        //Clear system output buffer
        flush();

        return readfile($file->path);
        die();
        */

    }
}
