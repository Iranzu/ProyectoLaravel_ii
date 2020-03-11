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
<<<<<<< HEAD

        $validator = Validator::make($request->all(), [
            'numchip' => 'required|max:9|unique:_proyecto_laravel_ii',
            'nombre' => 'required',
            'edad' => 'numeric|required|min:0',
=======
        $messages = [
            'numchip.required' => 'El campo numchip es obligatorio',
            'numchip.max' => 'Numchip tiene que tener máximo 4 dígitos',
            'numchip.min' => 'Numchip tiene que tener minimo 4 dígitos',
            'nombre.required' => 'El campo nombre es obligatorio',
            'edad.required' => 'El campo edad es obligatorio',
            'edad.min' => 'La edad mínima es de :min años ',
            'genero.required' => 'El campo género es obligatorio',
            'raza.required' => 'El campo raza es obligatorio',
            'salud.required' => 'El campo salud es obligatorio',
            'descripcion.required' => 'El campo descripción es obligatorio',
        ];

        $validator = Validator::make($request->all(), [
            'numchip' => 'required|max:4|min:4',
            'nombre' => 'required',
            'edad' => 'required|numeric|min:0',
>>>>>>> 29ba619c5cbbdbb2d563de0a643bf829c169ec97
            'genero' => 'required',
            'raza' => 'required',
            'salud' => 'required',
            'descripcion' => 'required'
        ],$messages);

       

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // crear la actividad...SE EXPLICA A CONTINUACIÓN
        $animal = new Animal;
        $animal->numchip = $request->numchip;
        $animal->nombre = $request->nombre;
        $animal->edad = $request->edad;
        $animal->genero = $request->genero;
        $animal->raza = $request->raza;
        $animal->salud = $request->salud;
        $animal->descripcion = $request->descripcion;
        $animal->save();
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