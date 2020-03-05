<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Animal;
use Illuminate\Http\Request;
use Validator;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return view('animales', ['animales' => $animales]);
    }

    public function adAnimal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numChip' => 'required|max:9',
            'nombre' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // crear la actividad...SE EXPLICA A CONTINUACIÓN
        $task = new Animal;
        $task->numChip = $request->numChip;
        $task->nombre = $request->nombre;
        $task->save();
        return redirect('/')->withInput();
    }

    public function deleteAnimal(Request $request)
    {
        $rules = ['id_animal' => 'integer'];
        $validator = Validator::make($request->only('id_animal'), $rules);
        if($validator->fails()){
            return redirect('/')->withErrors($validator);
        }else{
            if(Animal::where('id' , '=', $request->id_animal)->delete()){
                return redirect('/');
            }
        }
    }
}