<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class publicController extends Controller
{

    function search(Request $request) {
        $files = File::where("ispublic", true)->get();

        return view("publicFile", ['files' => $files]);
    }

    function setpublic(Request $request) {

        $files = File::where("id", $request->id)
            ->first();

        File::where("id", $request->id)
            ->update(['ispublic' => !$files->ispublic]);

        return redirect('/home');
    }
}
