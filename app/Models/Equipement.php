<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;
    public $table="equipement";

    public $fillable = [
        'type',
        'categorie',
        'produit',
        'n_serie',
        'statut',
        'prix',
        'netbios',
        'caracteristique_tech',
        'id_pers',
        'id_fourni',
    ];
}
