<?php

namespace sisEducativo;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    //Declarar la tabla de datos
    protected $table='personas';
	//Declarar primary Key
	protected $primaryKey='idpersonas';
	//Agregar automaticamente el registro
	public $timestamps=false;

	protected $fillable =[
		'nombres',
		'apellidos',
		'estado',
	];

	//Atributos que no se asignan al modelo
	protected $guarded =[

	];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
}
