<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () { // get, post, put, delete
    return view('welcome');
});

Route::get('welcome', function () { // la palabra que indiquemos aqui debe estar en la url para acceder
    return "Hello World";
});

Route::match(['get', 'post'], 'welcome', function () { // Permitimos acceso a una ruta desde varios tipos
    $url = url('welcome');
    return 'this is '.$url;
});

Route::get('posttt/{user}/{id?}', function ($user, $id = null) { // Asi insertamos parametros
    //si ponemos ? lo convertimos a opcional, en ese caso deberemos darle un valor por defecto
    if ($id === null) {
        return "Solo usuario $user";
    }
    return "Usuario $user y ID $id";
});

Route::pattern('id', '\d+'); // Para hacer uso de una expresion regular primero deberemos vincular la expresion al valor

Route::get('regexp/{id}', function($id) { // Una vez hecho podemos generar la ruta con el parametro
    return "Bien, has introducido un número : $id";
});

// Si la ruta es muy larga y queremos hacer referencia a la misma dentro del codigo podemos hacer uso de un as
Route::get('user/profile/whatever/example', ['as' => 'profile', function () {
    $url = route('profile');
    return 'This url is: ' . $url;
}]);

// Podemos crear grupos de rutas de tal manera que cuando se haga una peticion al grupo esta pasara por todas las rutas del grupo
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', function (){
        return '/user';
    });
  
    Route::get('profile', function () {
        return 'user/profile';
    });
});

// Tenemos una proteccion de forma nativa a los ataques CSRF
Route::post('home/articles/store', [

    'Middleware' => 'auth',
    'Before' => 'csrf',
    'Uses' => 'PostController@store'
  
  ]);
  
// Para acceder a un controlador deberemos hacerlo desde las rutas
Route::get('post/{id}', [ // Para ello deberemos usar la palabra clave uses
    'uses' => 'PostController@show'
]);

Route::post('pruebaAuth', [ // Para hacer uso de un middleware
    "Middleware" => 'auth', // ['auth', 'role:editor'] Para hacer uso de mas de un middleware
    'uses' => 'PostController@store'
]);

Route::get('/', 'PostController@index');
Route::get('/vista', 'PostController@vista');


Route::post('post/update/{id}', [
    'middleware' => 'auth',
    'before' => 'csrf',
    'uses' => 'PostController@store'
]);

Route::get('post/delete/{id}', [
    'middleware' => 'auth',
    'uses' => 'PostController@destroy'
]);


// Login And LogOut Routers

Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');


// Crear y ver nuevos registros

Route::get('post/create', [
    'middleware' => 'auth',
    'uses' => 'PostController@create'
]);

Route::post('post/store', [
	'middleware' => 'auth',
	'before' => 'csrf',
	'uses' => 'PostController@store'
]);