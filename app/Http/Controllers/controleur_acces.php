<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employe;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Hash;

class controleur_acces extends Controller
{
    public function ajout_employes(Request $request)
    {
        $employe = new employe();
        $taille_password = 8; //la taille du mot de passe
        $mot_de_passe = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        for($i=0; $i<$taille_password; $i++){
            $mot_de_passe .= $characters[rand(0, $taille_password - 1)];
        }

        $employe->nom = $request->input('nom');
        $employe->prenom = $request->input('prenom');
        $employe->password = bcrypt($mot_de_passe);
        $employe->email = $request->input('email');
        $employe->phone = $request->input('phone');
        $employe->fonction = 'service_client';
        $employe->domicile = $request->input('domicile');
        $employe->sexe = $request->input('sexe');
        $employe->save();
        return to_route('/service_client')->with('success', 'Employer ajouté avec succès. Mot de passe: ' . $mot_de_passe);
    }
    public function verification(Request $request)
    {
        $nom = $request->input('nom_agent');
        $password = $request->input('mot_de_passe');
        // Recherche de l'employé par nom
        $employe = employe::where('nom', $nom)->first();
        // Vérification du mot de passe
        if ($employe && Hash::check($password, $employe->password)) {
            return redirect('/service_client')->with('success', 'Connexion réussie');
        } else {
            return redirect('/connexion_agents')->with('error', 'Identifiants incorrects');
        }
    }
}
