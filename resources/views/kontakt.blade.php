@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 20px">
        @if($status ?? '')
            <div class="alert alert-success" role="alert">
                Deine E-Mail Anfrage wurde erfolgreich verschickt und wird jetzt von unserem Team bearbeitet!
            </div>
        @endif

        <form action="{{ route("sendEmail") }}" enctype="text/plain" method="GET">
            <label id = "darkText" for="Anrede">Anrede: </label>
            <br>
            <select class="form-control" name="anrede" id="Anrede">
                <option value="Herr">Herr</option>
                <option value="Frau">Frau</option>
            </select>
            <br>
            <label id = "darkText" for="name">Name: </label>
            <br>
            <input class="form-control" type="text" name="name" id="name">
            <br>
            <label id = "darkText" for="email">E-Mail: </label>
            <br>
            <input class="form-control" type="email" name="email" id="email">
            <br>
            <label id = "darkText" for="nachricht">Nachricht: </label>
            <br>
            <textarea class="form-control" name="message" id="message"></textarea>
            <br>
            <button type="submit" id="inputbutton" class="btn btn-primary">Nachricht absenden</button>
        </form>
    </div>
@endsection
