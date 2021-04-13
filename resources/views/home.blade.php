@extends('layouts.app')
<?php
use Illuminate\Support\Facades\Storage;
    session(['user' => Auth::user()->name]);
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in!') }}
                        <?php
                        echo asset('storage/Hallo.txt');

                        Storage::delete('Hallo.txt');

                        ?>

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

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">{{ __('Files') }}</div>
                @foreach($files as $file)
                    <p>{{$file->name}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
