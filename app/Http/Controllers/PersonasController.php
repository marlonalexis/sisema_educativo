<?php

namespace sisEducativo\Http\Controllers;

use Illuminate\Http\Request;
use sisEducativo\Personas;

class PersonasController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText')); //Obtener todos los registros de la base de datos
    		$personas=Personas::where('nombres','LIKE','%'.$query.'%')
    		->where('estado','=','A')
    		->orderBy('apellidos','asc')
    		->paginate(3);
    		return view('my.personas.index',['personas'=>$personas,'searchText'=>$query]);
    	}
    }
}
