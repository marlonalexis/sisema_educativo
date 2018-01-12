<?php

namespace sisEducativo\Http\Controllers;

use Illuminate\Http\Request;
use sisEducativo\Http\Controllers\Controller;
use sisEducativo\Personas;
use sisEducativo\User;
use sisEducativo\Http\Requests\PersonasFormRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function store(PersonasFormRequest $reques, PersonasFormRequest $requesUser){ //Almacenar el objeto del modelo personas en la tabla personas
    	$personas=new Personas;
        $user=new User;
        $user->password=bcrypt('12345678');
        $user->name=$request->get('nombres')." ".$request->get('apellidos');
        $user->email=$requesUser->get('email');
        $user->save();
        $personas->idpersonas=$user->id;
    	$personas->nombres=$request->get('nombres');
    	$personas->apellidos=$request->get('apellidos');
    	$personas->estado='A';
    	$personas->save();
        

        //$user->personas()->save($personas);
        Session::flash('sucess', 'La planificacion se ha creado Correctamente');
    	return Redirect::to('personas');
    }

    public function show($id){
    	return view("my.personas.show",["personas"=>Personas::findOrFail($id)]);
    }

    public function edit($id){
    	return view("my.personas.edit",["personas"=>Personas::findOrFail($id)],["user"=>User::findOrFail($id)]);
    }

    public function update(PersonasFormRequest $request,$id){
    	$personas=Personas::findOrFail($id);
    	$personas->nombres=$request->get('nombres');
    	$personas->apellidos=$request->get('apellidos');
        $personas->estado=$request->get('estado');
    	$personas->update();
        Session::flash('sucess', 'La Persona se ha modificado Correctamente');
    	return Redirect::to('personas');
    }

    public function destroy($id){
    	$personas=Personas::findOrFail($id);
    	$personas->estado='I';
    	$personas->update();
    	return Redirect::to('personas');
    }

}
