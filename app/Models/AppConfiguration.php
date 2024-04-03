<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConfiguration extends Model
{
    use HasFactory;
    protected $table = 'app_configurations';
    protected $fillable = [
        'name',
        'code_banque',
        'code_guichet',
    ];
}
