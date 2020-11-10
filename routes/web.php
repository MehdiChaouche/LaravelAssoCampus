<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth', 'can:access']], static function () {
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/users/create', function () {
    return view('admin');
});

Route::prefix('/admin')->group(function () {
    // Afficher le formulaire de création de membre
    Route::get('/users/create', 'AdminController@usercreateform')->name('admin.usercreateform');

    // Créer un membre
    Route::post('/users', 'AdminController@usercreate')->name('admin.usercreate');

    // Modifier un membre
    Route::put('/users/{id}', 'AdminController@usermodify')->name('admin.usermodify');

    // Supprimer un membre
    Route::delete('/users/{id}', 'AdminController@userdelete')->name('admin.userdelete');

    // Voir la liste des membres
    Route::get('/users', 'AdminController@userlist')->name('admin.userlist');

    // Voir la liste des membres qui ont une adhésion
    Route::get('users?filter=subscriber', 'AdminController@sublist')->name('admin.sublist');

    // Créer une adhésion pour un membre
    Route::post('users/{id}/memberships', 'AdminController@membershipcreate')->name('admin.membershipcreate');

    // Modifier une adhésion pour un membre
    Route::put('users/{id}/memberships/{id}', 'AdminController@membershipmodify')->name('admin.membershipmodify');

    // Supprimer une adhésion pour un membre
    Route::delete('users/{id}/memberships/{id}', 'AdminController@membershipdelete')->name('admin.membershipdelete');

    // Voir la liste des licenses
    Route::get('/licenses', 'AdminController@licenselist')->name('admin.licenselist');

    // Afficher le formulaire de création de license
    Route::get('/licenses/create', 'AdminController@licensecreate')->name('admin.licensecreate');

    // Créer un type d'adhésion
    Route::post('/licenses', 'AdminController@licensetypecreate')->name('admin.licensetypecreate');

    // Modifier un type d'adhésion
    Route::put('/licenses/{id}', 'AdminController@licensetypemodify')->name('admin.licensetypemodify');

    // Supprimer un type d'adhésion
    Route::delete('/licenses/{id}', 'AdminController@licensetypedelete')->name('admin.licensetypedelete');
});