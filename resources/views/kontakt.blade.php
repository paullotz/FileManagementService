@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container">
            <h2>Contact</h2>
        </div>
        <div class="container">
            <form action="mailto:helpdesk@gmail.com" enctype="text/plain" method="POST" >
                <label for="Anrede">Anrede: </label>
                <br>
                <select class="form-control" name="anrede" id="Anrede">
                    <option value="Herr">Herr</option>
                    <option value="Frau">Frau</option>
                </select>
                <br>
                <label for="name">Name: </label>
                <br>
                <input class="form-control" type="text" name="name" id="name">
                <br>
                <label for="email">E-Mail: </label>
                <br>
                <input class="form-control" type="email" name="email" id="email">
                <br>
                <label for="nachricht">Nachricht: </label>
                <br>
                <textarea class="form-control" name="Nachricht" id="nachricht" ></textarea>
                <br>
                <button type="submit" id="inputbutton" class="btn btn-primary">Nachricht absenden</button>
            </form>
        </div>
    </div>
@endsection
