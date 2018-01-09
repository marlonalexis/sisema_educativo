<?php

namespace sisEducativo\Http\Controllers;

use Illuminate\Http\Request;
use sisEducativo\Http\Controllers\Controller;
use sisEducativo\Personas;
use sisEducativo\Http\Request\PersonasFormRequest;
use DB;

class PersonasController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText')); //Obtener todos los registros de la base de datos
    		$personas=DB::table('personas')->where('nombres','LIKE','%'.$query.'%')
    		->where('estado','=','1')
    		->orderBy('idpersonas','desc')
    		->paginate(3);
    		return view("my.personas.index",["personas"=>$personas,"searchText"=>$query]);
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
    	$personas->update();
    	return Redirect::to('my/personas');
    }

    public function destroy($id){
    	$personas=Personas::findOrFail($id);
    	$personas->estado='A';
    	$personas->update();
    	return Redirect::to('my/personas');
    }

}
