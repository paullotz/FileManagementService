@extends('layouts.app')
<?php
use Illuminate\Support\Facades\Storage;
    session(['user' => Auth::user()->name]);
?>
@section('content')
<div class="container"  style="margin-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    {{ __('Du bist eingeloggt!') }}
                </div>
            </div>
            <br/>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <br/>
            <div class="card">
                <div class="card-header">File Upload</div>
                <div class="card-body">

                    <form action="{{route('store')}}" class="dropzone" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="file" />

                        <input type="hidden" name="user" value="{{Auth::user()->name}}"/>
                    </form>

                    <!--{{storage_path()}}-->

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">{{ __('Files') }}</div>
                <form action="{{route('filedelete')}}" method="post" enctype="multipart/form-data">
                    @csrf
                @foreach($files as $file)
                    <input type="radio" name="id" id="{{$file->id}}" value="{{$file->id}}"/>

                        <label for="{{$file->id}}">{{$file->name}}</label><br>

                        <img src="{{storage_path().'\app\storage\\'.$file->name}}" class="img-thumbnail" height="200px" width="200px">
                    <p>{{storage_path().'\app\storage\\'.$file->name}}</p>
                        <br>
                @endforeach
                    <input type="submit" value="File Delete"/>
                </form>
            </div>
            <img src="{{storage_path().'\app\storage\Unbekannt.PNG'}}">
        </div>
    </div>
</div>
@endsection
