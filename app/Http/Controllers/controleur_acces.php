<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Employe;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class controleur_acces extends Controller
{
    public function ajout_employes(Request $request)
    {

        $taille_password = 4; //la taille du mot de passe
        $mot_de_passe = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        for($i=0; $i<$taille_password; $i++){
            $mot_de_passe .= $characters[rand(0, $taille_password - 1)];
        }
        

        $employe = Employe::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'password'=>Hash::make($mot_de_passe),
            'email'=>$request->email,
            'phone'=>$request->phone,
            'fonction'=>'service_client',
            'domicile'=>$request->domicile,
            'sexe'=>$request->sexe,
        ]);
        return response()->json([
            'message' => 'Inscription réussie',
            'mot_de_passe' => $mot_de_passe,
        ], 201);

    }
    public function login(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'mot_de_passe' => 'required|string',
        ]);

        $nom = $request->input('nom');
        $password = $request->input('mot_de_passe');

        $employe = Employe::where('nom', $nom)->first();

        if (! $employe) {
            return response()->json(['message' => 'Identifiants incorrects'], 401);
        }

        if (! Hash::check($password, $employe->password)) {
            return response()->json(['message' => 'Identifiants incorrects'], 401);
        }
        $token = JWTAuth::fromUser($employe);

        $employe->token = $token;
        $employe->save();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }
}