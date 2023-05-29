<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bon_commande extends Model
{
    use HasFactory;
    public $table="bon_commande";
    protected $primaryKey = 'id_com'; // Specify the primary key column
    public $fillable = [
        'id_com',
        'date_cm',
        'qt_commande',
        'id_fourni',
    ];
    public function equipements()
    {
        return $this->hasMany(Equipement::class, 'id_com');
    }
    public function bonCommande()
    {
        return $this->hasMany(Bon_livraison::class, 'id_com');
    }
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fourni');
    }
}
