<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Discussion extends Authenticatable implements JWTSubject
{
    protected $table = 'discussions';
    use Notifiable;
    //
    protected $fillable = [
        'id',
        'id_client',
        'id_employe',
        'statut',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    
    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function employe() {
        return $this->belongsTo(Employe::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
