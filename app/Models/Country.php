<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'iso_code',
        'iban_check_digits',
        'id_national_length',
        'id_national_type',
        'phone_code',
    ];

    /**
     * Get the accounts associated with the country.
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

}