<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    public $table="fournisseur";
    protected $primaryKey = 'id_fourni'; // Specify the primary key column
    public $fillable = [
        'id_fourni',
        'nom_four',
        'responsable',
        'email',
        'adresse',
        'tele_siege',
        'tele_agence',
        
    ];
}
