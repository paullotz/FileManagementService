<?php
use Illuminate\Support\Facades\Auth;

// Loading User Parameters from Database
$id = Auth::id();
$users = DB::select("select * from users where id = :id", ["id" => $id]);

$userName = "";
$userEMail = "";
$userEMailVerified = "";
$userAccountCreationDate = "";

foreach ($users as $user) {
    $userName = $user->name;
    $userEMail = $user->email;
    $userEMailVerified = $user->email_verified_at;
    $userAccountCreationDate = $user->created_at;
}

if ($userEMailVerified == null) {
    $userEMailVerified = "Nein";
} else {
    $userEMailVerified = "Ja";
}

// Logic for GET Request
$txtName = "";
$txtEMail = "";

isset($_GET["txtName"]) ? $txtName = $_GET["txtName"] : false;
isset($_GET["txtEMail"]) ? $txtEMail = $_GET["txtEMail"] : false;

if ($txtName != false && $txtEMail != false) {
    DB::update('update users set name = ?, email=? where id = ?',[$txtName, $txtEMail, $id]);

    header("Refresh:0; url=/einstellungen");
}

// Logic for changing Password
echo '<script type ="text/JavaScript">';
echo 'alert("JavaScript Alert Box by PHP")';
echo '</script>';  ?>

@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 20px">
        @guest
            <div class="alert alert-danger text-center" role="alert">
                Du musst dich einloggen, um deine Einstellungen sehen zu können!
            </div>
        @else
            <div class="card mb-3">
                <div class="card-header">Persönliche Daten</div>
                <div class="card-body">
                    <form method="GET" action="/einstellungen" class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name:</span>
                            <input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $userName; ?>" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">E-Mail:</span>
                            <input type="email" class="form-control" id="txtEMail" name="txtEMail" value="<?php echo $userEMail; ?>" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">E-Mail bestätigt:</span>
                            <input type="text" class="form-control" id="txtEMailVerified"
                                   value="<?php echo $userEMailVerified; ?>" readonly>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Account erstellt am:</span>
                            <input type="text" class="form-control" id="txtAccountCreationDate"
                                   value="<?php echo $userAccountCreationDate; ?>" readonly>
                        </div>

                            <button type="submit" class="btn btn-secondary" id="btnSubmitChanges">Änderungen
                                bestätigen
                            </button>

                    </form>

                    <form method="GET" action="/einstellungen">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Neues Passwort:</span>
                            <input type="password" class="form-control" name="txtPassword" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Passwort wiederholen:</span>
                            <input type="password" class="form-control" name="txtPasswordRepeat" required>
                        </div>

                        <button type="submit" class="btn btn-secondary" id="btnChangePassword">Passwort ändern</button>
                    </form>
                </div>
            </div>
        @endguest
    </div>
@endsection
