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

Route::group(['prefix' => 'painel'], function () {


    //Post controller
    Route::get('posts', 'Painel\PostController@index');
    //PermissionController
    Route::get('permission', 'Painel\PermissionController@index');

    Route::get('permission/{id}/roles', 'Painel\PermissionController@roles');
    //RolesController
    Route::get('roles', 'Painel\RoleController@index');

    Route::get('role/{id}/permissions', 'Painel\RoleController@permissions');

    //UsersController
    Route::get('users', 'Painel\UserController@index');

    Route::get('user/{id}/roles', 'Painel\UserController@roles');
    //painel controller
    Route::get('/', 'Painel\PainelController@index');

});
Auth::routes();

Route::get('/', 'Portal\SiteController@index');