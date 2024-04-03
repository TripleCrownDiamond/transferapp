<?php
// app/Models/Credit.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'uniq_id',
        'credit_type_id',
        'amount',
        'repayment_duration',
        'interest_rate',
        'grace_period',
        'account_id',
        'status',
        'credit_motif',
        'reject_motif'
    ];

    /**
     * Get the user that owns the credit.
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Get the credit type associated with the credit.
     */
    public function creditType()
    {
        return $this->belongsTo(CreditType::class);
    }
}