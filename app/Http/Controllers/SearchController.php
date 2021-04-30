<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request) {
        $searchName = $request->name;
        $id = Auth::id();

        if ($searchName !== "") {
            $files = DB::select("select name from files where name like '%$searchName%'");
        }

        return view("searchFile", ['files' => $files]);
    }
}
