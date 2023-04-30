<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $table="users";

    public $fillable = [
        'nom',
        'prenom',
        'username',
        'email',
        'password',
        'profil',
        'has_access_to_user_management',
        'has_access_to_inventory_management',
        'has_access_to_view_inventory',
        'has_access_to_view_history'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
