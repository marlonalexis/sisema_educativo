<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return redirect()->route('index');
    return view('welcome');
});

/* Creacion de ruta de prueba 
Nota: El orden en el que pongamos las rutas es importante, puesto que primero se gestionarán las que aparezcan antes en el código. */
/*Route::get('/test', function(){
	echo "Esto es una simple prueba!!";
});

/* Creacion de ruta de prueba con parametro */
/*Route::get('colaboradores/{nombre}', function($nombre){
	return "Mostrando el colaborador $nombre";
});

/*Definir una ruta a un controlador tenemos que indicarlo en el método que registra la ruta. En ese método, en lugar de definir una función anónima indicaremos el nombre y método del controlador a ejecutar. */
//Route::get('tienda/productos/{id}','TiendaController@producto');
/* Luego en el controlador recibimos el parámetro definido en el patrón de URI de la ruta registrada. 

public function producto($id)
{
    return "Esto muestra un producto. Recibiendo $id";
} */

/* Definir una ruta recibiendo variablews de entradas y variables declaradas */
/*Route::get('categoria/{categoria}/{pagina?}', function($categoria, $pagina = 1){
	return "Viendo categoría $categoria y página $pagina";
});

/* Definir el tipo de parametro de entrada */
/*Route::get('colaboradores/{nombre}', function($nombre){
	return "Mostrando el colaborador $nombre";
})->where(array('nombre' => '[a-zA-Z]+'));*/

/* Referenciar vista */
/*Route::get('/', function()
{
    return view('home', array('nombre' => 'Marlon'));
});*/

/* Ligar vista con el controlador */
Route::resource('my/personas','PersonasController');

Route::get('/personas', 'PersonasController@index')->name('index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
