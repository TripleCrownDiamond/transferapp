<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'card_type',
        'card_number',
        'expiry_date',
        'card_cryptogram',
        'cvv',
        'card_balance',
        'account_id',
    ];

    /**
     * Get the account that owns the card.
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
