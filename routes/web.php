<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controleur_acces;


Route::view('/service_technique','service_technique');
Route::view('/service_client','service_client');
Route::view('/assistance','assistance');
Route::post('/ajout_employer', [controleur_acces::class, 'ajout_employes']);
Route::view('/superviseur','interface_supervision');
Route::post('/login', [controleur_acces::class, 'login']);
Route::view('/connexion_agents','connexion_agents');
