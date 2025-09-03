<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    //
    protected $fillable = [
        'id',
        'nom',
        'password',
        'email',
        'phone',
        'fonction',
        'domicile',
    ];

    //récupération des employés du service client
    public static function getEmployesClient()
    {
        return self::where('fonction', 'service client')->get();
    }
}
