@extends('layouts.app')
<?php
use Illuminate\Support\Facades\Storage;
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <?php
                        echo asset('storage/Hallo.txt');

                        Storage::delete('Hallo.txt');

                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
