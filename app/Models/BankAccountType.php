<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccountType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Ajoutez d'autres colonnes si nécessaire
    ];
}
