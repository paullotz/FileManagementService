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

                <form action="{{ route('store') }}"  onsubmit="return true;" class="dropzone" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="file"/>

                    <input type="hidden" name="user" value="{{Auth::user()->name}}"/>
                </form>
            </div>
        </div>
        <!-- Schauen ob der Files Array Empty ist damit kein leerer Table angezeigt wird -->

        <div class="card">
            <div class="card-header">{{ __('Files') }}</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Filename</th>
                        <th scope="col">Show Image</th>
                        <th scope="col">Delete File</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                        <form action="{{ route('filedelete') }}" onsubmit="check();" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{ $file->id }}">
                            <tr>
                                <th>{{ $file->id }}</th>
                                <th>{{ $file->name }}</th>
                                @if ($file->name)
                                    <th><input type="submit" value="Show"/></th>
                                @endif
                                <th><input type="submit" value="Delete"/></th>
                            </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
        </div>

    </div>
    <br><br><br>
@endsection
