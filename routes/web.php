<?php

use App\Animal;

Route::get('/', function () {
    $animales = Animal::all();
    return view('animales', ['animales'=>$animales]);
});
