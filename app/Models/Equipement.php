<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    use HasFactory;
    public $table="equipement";
    protected $primaryKey = 'id_equ';
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
        'id_com',
        'id_livre',
        'updated_at',
        'created_at',
    ];
    public function personne()
    {
        return $this->belongsTo(Personne::class, 'id_pers');
    }
    public function bonCommande()
    {
        return $this->belongsTo(Bon_commande::class, 'id_com');
    }

    public function bonLivraison()
    {
        return $this->belongsTo(Bon_livraison::class, 'id_livre');
    }
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fourni');
    }
    public function affectations()
    {
        return $this->hasMany(Affectation::class, 'id_equ');
    }
}
