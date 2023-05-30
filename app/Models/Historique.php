<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;
    public $table="historique";
    protected $primaryKey = 'id_hist'; // Specify the primary key column
    public $fillable = [
        'id_hist',
        'modified_at',
        'modified_by',
        'type_modif',
        'comment',
        'id_equ ',
        'id ',
        'id_fourni '
        
    ];
   
}
