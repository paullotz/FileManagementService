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
                    <form method="post" action="{{ route("updatedata") }}" class="mb-3">
                        @csrf

                        <div class="input-group mb-3">
                            <span class="input-group-text">Name:</span>
                            <input type="text" class="form-control" id="txtName" name="txtName" value="{{ $user->name }}" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">E-Mail:</span>
                            <input type="email" class="form-control" id="txtEMail" name="txtEMail" value="{{ $user->email }}" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">E-Mail bestätigt:</span>
                            <input type="text" class="form-control" id="txtEMailVerified"
                                   <?php $userEMailVerified = "";
                                   if ($user->email_verified_at == null) {
                                       $userEMailVerified = "Nein";
                                   } else {
                                       $userEMailVerified = "Ja";
                                   } ?>
                                   value="<?php echo $userEMailVerified; ?>" readonly>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Account erstellt am:</span>
                            <input type="text" class="form-control" id="txtAccountCreationDate"
                                   value="{{ $user->created_at }}" readonly>
                        </div>

                            <button type="submit" class="btn btn-secondary" id="btnSubmitChanges">Änderungen
                                bestätigen
                            </button>

                    </form>

                    <form method="post" action="{{ route("changepw") }}">
                        @csrf

                        <div class="input-group mb-3">
                            <span class="input-group-text">Neues Passwort:</span>
                            <input id = "txtPassword" type="password" class="form-control" name="txtPassword" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Passwort wiederholen:</span>
                            <input id = "txtPasswordRepeat" type="password" class="form-control" name="txtPasswordRepeat" required>
                        </div>

                        <button type="submit" class="btn btn-secondary" id="btnChangePassword">Passwort ändern</button>
                    </form>
                </div>
            </div>
        @endguest
    </div>
@endsection
