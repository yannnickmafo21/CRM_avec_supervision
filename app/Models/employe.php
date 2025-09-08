<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employe extends Authenticatable implements JWTSubject
{
    protected $table = 'employes';
    use Notifiable;
    //
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'password',
        'email',
        'phone',
        'fonction',
        'domicile',
        'sexe',
        'token',
    ];

    //récupération des employés du service client
    public static function getEmployesClient()
    {
        return self::where('fonction', 'service client')->get();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
