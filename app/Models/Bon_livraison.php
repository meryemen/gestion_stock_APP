<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bon_livraison extends Model
{
    use HasFactory;
    public $table="bon_livraison";
    protected $primaryKey = 'id_livre'; // Specify the primary key column
    public $fillable = [
        'id_livre',
        'date_livre',
        'qt_livre',
        'id_fourni',
        'id_com',
    ];
    public function equipements()
    {
        return $this->hasMany(Equipement::class, 'id_livre');
    }
    public function bonCommande()
    {
        return $this->belongsTo(Bon_commande::class, 'id_com');
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fourni');
    }

}
