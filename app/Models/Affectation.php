<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
    public $table="affectation";
    protected $primaryKey = 'id_affect'; 
    public $fillable = [
        'id_equ',
        'id_pers',
        'date_affectation',
       
    ];
    public function equipement()
    {
        return $this->belongsTo(Equipement::class, 'id_equ');
    }
    
    public function personne()
    {
        return $this->belongsTo(Personne::class, 'id_pers');
    }
    
}
