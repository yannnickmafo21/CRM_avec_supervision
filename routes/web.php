<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controleur_acces;

Route::view('/service_client','service_client');
Route::view('/service_technique','service_technique');
Route::view('/assistance','assistance');
Route::view('/connexion_agents','connexion_agents');
Route::get('/ajout_employer', [controleur_acces::class, 'ajout_employes']);
Route::get('auth_employer', [controleur_acces::class, 'verification']);
Route::view('/superviseur','interface_supervision');
