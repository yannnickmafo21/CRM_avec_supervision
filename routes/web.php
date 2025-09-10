<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controleur_acces;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Employe;

//routes non controllées
Route::view('/assistance','assistance');
Route::view('/superviseur','interface_supervision');
Route::view('/connexion_agents','connexion_agents');
Route::view('/service_technique','service_technique');

//post methods
Route::post('/ajout_employer', [controleur_acces::class, 'ajout_employes']);
Route::post('/login', [controleur_acces::class, 'login']);

Route::group(['prefix' => 'api'], function(){
    Route::view('/service_client','service_client');
    Route::get('/prendre_employe', [controleur_acces::class, 'getEmploye']);

})->middleware("jwt.auth");


