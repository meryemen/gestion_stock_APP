<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    public $table="personne";
    protected $primaryKey = 'id_pers';
    public $fillable = [
        'nom_prenom',
        'username',
        'region',
        'direction',
        'Site',
        'updated_at',
        'created_at',
        
        
    ];
    public function equipements_pers()
    {
        return $this->hasMany(Equipement::class, 'id_pers');
    }
    public function affectations()
    {
        return $this->hasMany(Affectation::class, 'id_pers');
    }
}
