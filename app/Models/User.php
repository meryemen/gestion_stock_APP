<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $table="users";
    protected $primaryKey = 'id';
    public $fillable = [
        'nom',
        'prenom',
        'username',
        'email',
        'password',
        'Fonction',
        'Site',
        'Region',
        'Direction',
        'profil',
        'accessStock',
        'manageStock',
        'manageUsers',
        'manageSuppliers',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
}
