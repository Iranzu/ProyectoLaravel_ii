<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return view('animales', ['animales' => $animales]);
    }
}