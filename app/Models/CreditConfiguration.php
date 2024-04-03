<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditConfiguration extends Model
{
    use HasFactory;
    protected $fillable = [
        'interest_rate',
        'grace_period',
    ];
}
