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
            <div class="container mt-4">

                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        <h2>Search for File</h2>
                    </div>

                    <div class="card-body">
                        <form method="GET" action="/searchFile">


                            <div class="form-group">
                                <label for="exampleInputEmail1">Search file by name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>

                        </form>
                        <div id="result">

                            <?php


                            // Loading User Parameters from Database
                            $id = Auth::id();

                            @$searchName= $_GET["name"];


                            if($searchName!=null){

                                $files = DB::select("select name from files where name like '%$searchName%' ");


                              //  var_dump($files);



                                foreach ($files as $file) {

                                   // C:\Users\____\PhpstormProjects\FileManagementService\public\favicon.png

                                    echo '<p>',$file->name,'</p><br>';
                                    echo "  <img src=\"storage/$file->name\" class=\"img-thumbnail\" height=\"200px\" width=\"200px\">";

                                }



                            }

                            ?>

                        </div>


                    </div>
                </div>

            </div>
        @endguest
    </div>
@endsection
