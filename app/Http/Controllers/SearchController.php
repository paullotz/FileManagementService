<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request) {
        $searchName = $request->name;
        $name= $request->user()->name;


        if ($searchName !== "") {
            $files = DB::select("select name from files where name like '%$searchName%' and ownername like '$name'");
        }

        return view("searchFile", ['files' => $files]);
    }
}
