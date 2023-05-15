<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    public $table="fournisseur";

    public $fillable = [
        'id_fourni',
        'nom_four',
        
    ];
}
