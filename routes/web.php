<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controleur_acces;
use App\Http\Controllers\inscription_client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Employe;

//routes non controllées
Route::view('/superviseur','interface_supervision');
Route::view('/connexion_agents','connexion_agents');
Route::view('/service_technique','service_technique');
Route::view('/assistance','assistance');

//post methods

//post pour client
Route::post('/inscrire', [inscription_client::class, 'inscription_client']);

//post pour employes
Route::post('/ajout_employer', [controleur_acces::class, 'ajout_employes']);
Route::post('/login', [controleur_acces::class, 'login']);

Route::group(['prefix' => 'api'], function(){
    Route::view('/service_client','service_client');
    Route::get('/prendre_employe', [controleur_acces::class, 'getEmploye']);
    Route::get('/prendre_client', [inscription_client::class, 'getClient']);

})->middleware("jwt.auth");


