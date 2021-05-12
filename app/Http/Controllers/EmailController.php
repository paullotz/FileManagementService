<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Mail\SupportEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request) {
        try {
            // E-Mail zu der angegeben Mail also zum "Kunden"
            Mail::to($request->email)->send(new ContactEmail);

            // Mail an die eigene Email damit man weiß dass man sich darum kümmern muss
            Mail::to("filemanagementservice@web.de")->send(new SupportEmail($request->anrede, $request->name, $request->email, $request->message));
        } catch (\Exception $e) {
            return view('/kontakt')->with('status', $e);
        }

        return view('/kontakt')->with('status', true);
    }
}
