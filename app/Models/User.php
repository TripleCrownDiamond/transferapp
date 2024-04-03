<?php

namespace App\Models;

use App\Notifications\CreditRequestNotification;
use App\Notifications\LoanApprovedNotification;
use App\Notifications\LoanRejectedNotification;
use App\Notifications\SuperAdminCreditRequestNotification;
use App\Notifications\SuperAdminNewUserNotification;
use App\Notifications\VerifyEmailNotification;
use App\Notifications\WelcomeNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $dates = ['last_login'];
    protected $fillable = [
        'uniq_id',
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'last_login',
        'language_id',
        'created_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    /**
     * Get the language associated with the user.
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Get the accounts associated with the user.
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
    public function kycs()
    {
        return $this->hasMany(Kyc::class);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification);
    }

    public function sendWelcomeNotification()
    {
        $this->notify(new WelcomeNotification);
    }

    public function sendCreditRequestNotification($credit, $currency)
    {
        $this->notify(new CreditRequestNotification($credit, $currency));
    }
    public function sendAcceptLoanNotification($credit_to_update)
    {
        $this->notify(new LoanApprovedNotification($credit_to_update));
    }
    public function sendRejectLoanNotification($credit_to_update)
    {
        $this->notify(new LoanRejectedNotification($credit_to_update));
    }
    public function sendSuperAdminCreditRequestNotification($credit, $currency, $client)
    {
        if ($this->role === 'super-admin') {
            $this->notify(new SuperAdminCreditRequestNotification($credit, $currency, $client));
        }
    }

    public function sendNewUserNotification()
    {
        if ($this->role === 'super-admin') {
            $this->notify(new SuperAdminNewUserNotification());
        }
    }

}
