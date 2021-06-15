@extends('layouts.app')
<?php
use Illuminate\Support\Facades\Storage;
session(['user' => Auth::user()->name]);
?>

@section('content')
    <div class="container" style="margin-top: 20px">
        <div class="card mb-3">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                {{ __('Du bist eingeloggt!') }}
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card mb-3">
            <div class="card-header">File Upload</div>
            <div class="card-body">

                <form action="{{ route('store') }}" onsubmit="return true;" class="dropzone" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="file"/>

                    <input type="hidden" name="user" value="{{Auth::user()->name}}"/>
                </form>
            </div>
        </div>

        <!-- Schauen ob der Files Array Empty ist damit kein leerer Table angezeigt wird -->
        @if(!$files->isEmpty())
        <div class="card">
            <div class="card-header">{{ __('Files') }}</div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Filename</th>
                    <th scope="col">Image Preview</th>
                    <th scope="col">Delete File</th>
                    <th scope="col">Download File</th>
                    <th scope="col">Public</th>
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <form action="{{ route('filedelete') }}" method="post" enctype="multipart/form-data"  onSubmit="return confirm('Sicher?');">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $file->id }}">
                        <tr>
                            <th>{{ $file->id }}</th>
                            <th>{{ $file->name }}</th>
                            @if( pathinfo("storage/".$file->name, PATHINFO_EXTENSION)=="jpg" || pathinfo("storage/".$file->name, PATHINFO_EXTENSION)=="png")
                                <th>
                                    <img src="storage/{{ $file->name }}" class="img-thumbnail" height="200px" width="200px">
                                    <a href="storage/{{ $file->name }}" data-lightbox="{{ $file->name }}">Vergrößern</a>
                                </th>
                            @else
                                <th><img src="dokument.png" class="img-thumbnail" height="100px" width="100px"></th>
                            @endif
                            <th><input type="submit" value="Delete"/></th>
                    </form>

                    <form action="{{ route('download') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$file->id}}">
                        <th><input type="submit" value="Download"/></th>
                    </form>
                    <form action="{{ route('setpublic') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$file->id}}">
                        @if($file->ispublic == false)
                            <th><input type="submit" value="Set Public"/></th>
                        @elseif($file->ispublic == true)
                            <th><input type="submit" value="Set Private"/></th>
                        @endif
                    </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <br><br><br>
@endsection
