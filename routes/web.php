<?php
use App\Animal;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     $animales = Animal::all();
//     return view('animales', ['animales'=>$animales]);
// });

Route::get('/', 'AnimalController@index');


Route::post('/animal', 'AnimalController@adAnimal');

Route::post('/animal/deleteanimal', 'AnimalController@deleteAnimal');
