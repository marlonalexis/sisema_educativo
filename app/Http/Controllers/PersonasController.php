<?php

namespace sisEducativo\Http\Controllers;

use Illuminate\Http\Request;
use sisEducativo\Http\Controllers\Controller;
use sisEducativo\Personas;
use sisEducativo\Http\Requests\PersonasFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class PersonasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText')); //Obtener todos los registros de la base de datos
    		$personas=DB::table('personas')->where('nombres','LIKE','%'.$query.'%')
    		//->where('estado','=','A')
    		->orderBy('apellidos','asc')
    		->paginate(3);
    		return view('my.personas.index',['personas'=>$personas,'searchText'=>$query]);
    	}
    }

    public function create(){
    	return view("my.personas.create");
    }

    public function store(PersonasFormRequest $request){ //Almacenar el objeto del modelo personas en la tabla personas
    	$personas=new Personas;
    	$personas->nombres=$request->get('nombres');
    	$personas->apellidos=$request->get('apellidos');
    	$personas->estado='A';
    	$personas->save();
    	return Redirect::to('my/personas');
    }

    public function show($id){
    	return view("my.personas.show",["personas"=>Personas::findOrFail($id)]);
    }

    public function edit($id){
    	return view("my.personas.edit",["personas"=>Personas::findOrFail($id)]);
    }

    public function update(PersonasFormRequest $request,$id){
    	$personas=Personas::findOrFail($id);
    	$personas->nombres=$request->get('nombres');
    	$personas->apellidos=$request->get('apellidos');
        $personas->estado=$request->get('estado');
    	$personas->update();
    	return Redirect::to('my/personas');
    }

    public function destroy($id){
    	$personas=Personas::findOrFail($id);
    	$personas->estado='I';
    	$personas->update();
    	return Redirect::to('my/personas');
    }

}
