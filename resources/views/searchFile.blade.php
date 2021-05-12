<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
?>
@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 20px">
        @guest
            <div class="alert alert-danger text-center" role="alert">
                Du musst dich einloggen, um deine Einstellungen sehen zu können!
            </div>
        @else
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <h2>Search for File</h2>
                </div>
                <div class="card-body">
                    <form method="get" action="{{ route("search") }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Search file by name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </form>
                    <div id="result">
                        @foreach($files as $file)

                            <p>{{ $file->name }}</p>

                            @if( pathinfo("storage/".$file->name, PATHINFO_EXTENSION)=="jpg" || pathinfo("storage/".$file->name, PATHINFO_EXTENSION)=="png")
                            <img src="storage/{{ $file->name }}" class="img-thumbnail" height="200px" width="200px">
                                <br>
                                <br>
                            @else
                                <img src="dokument.png" class="img-thumbnail" height="100px" width="100px">
                                <br>
                                <br>
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        @endguest
    </div>
@endsection
