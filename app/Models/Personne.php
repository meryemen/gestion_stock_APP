<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    public $table="personne";

    public $fillable = [
        'nom_prenom',
        'username',
        'date_affectation',
        'region',
        'direction',
        'Site',
        'updated_at',
        'created_at',
        
    ];
}
