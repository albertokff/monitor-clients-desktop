<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $connection = 'nativephp';
    protected $fillable = [
        'nome', 
        'email'
    ];
}
