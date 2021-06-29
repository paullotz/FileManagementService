<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
?>
@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 20px">
        @guest
            <div class="alert alert-danger text-center" role="alert">
                Du musst dich einloggen, um die Public Page sehen zu können!
            </div>
        @else
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <h2>Public Files</h2>
                </div>
                <div>
                @if(!$files->isEmpty())
                    <div class="card">
                        <div class="card-header">{{ __('Files') }}</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Filename</th>
                                <th scope="col">Image Preview</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Download File</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
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
                                        <th>{{$file->ownername}}</th>
                                <form action="{{ route('download') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$file->id}}">
                                    <th><input type="submit" value="Download"/></th>
                                </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            </div>
        @endguest
    </div>
@endsection
