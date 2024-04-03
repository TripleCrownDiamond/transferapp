<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConfiguration extends Model
{
    use HasFactory;

    protected $table = 'user_configurations';

    protected $fillable = [
        'user_active',
        'account_active',
        'request_otp',
    ];
}