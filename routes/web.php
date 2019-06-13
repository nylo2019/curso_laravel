<?php
use App\Http\Controllers\InicioController;

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
/*
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', 'InicioController@index');

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear') ->name('crear_permiso');
    /*Rutas menu*/
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
    Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
    /*Rutas rol*/
    Route::get('rol', 'RolController@index')->name('rol');
    Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
    Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');
    Route::delete('rol/{id}/eliminar', 'RolController@eliminar')->name('eliminar_rol');
    Route::put('rol/{id}/actualizar', 'RolController@actualizar')->name('actualizar_rol');
    Route::post('rol', 'RolController@guardar')->name('guardar_rol');
    /*Rutas menu-rol*/
    Route::get('menu-rol', 'MenuRolController@index')->name('menu-rol');
    Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol');

});

