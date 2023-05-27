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
        'cracteristique_tech',
        'id_pers',
        'id_fourni',
        'updated_at',
        'created_at',
    ];
}
