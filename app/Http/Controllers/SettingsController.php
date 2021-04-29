<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    function loaduser() {
        $id = Auth::id();
        $user = User::where("id", $id)->first();

        return view("einstellungen", ["user" => $user]);
    }

    function updatedata(Request $request) {
        $id = Auth::id();
        $txtName = $request->txtName;
        $txtEMail = $request->txtEMail;

        if ($txtName !== "" && $txtEMail !== "") {
            DB::update('update users set name = ?, email=? where id = ?',[$txtName, $txtEMail, $id]);
        }

        // Load User again with new Details
        $user = User::where("id", $id)->first();

        return view("einstellungen", ["user" => $user]);
    }

    function changepw(Request $request) {
        $id = Auth::id();
        $txtPassword = $request->txtPassword;
        $txtPasswordRepeat = $request->txtPasswordRepeat;

        if ($txtPassword !== "" && $txtPasswordRepeat !== "") {
            if ($txtPassword  == $txtPasswordRepeat) {
                $hashedPW = password_hash($txtPassword, PASSWORD_DEFAULT);

                DB::update('update users set password=? where id = ?', [$hashedPW, $id]);
            } else {
                //Sweetalert ersetzen
                echo '<script type ="text/JavaScript">';
                echo 'alert("Die Passwörter stimmen nicht überein!")';
                echo '</script>';
            }
        }

        // Load User again with new Details
        $user = User::where("id", $id)->first();

        return view("einstellungen", ["user" => $user]);
    }
}
