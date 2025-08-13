<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'phone',
        'email',
        'password',
        'first_name',
        'last_name',
        'photo',
        'address',
        'gender',
        'birthday',
        'is_active',
        'is_delete',
        'group_role',
        'otp_code',
        'otp_expires_at',
        'otp_attempts',
        'otp_context',
        'last_login_ip',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'otp_code',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthday' => 'date',
            'is_active' => 'boolean',
            'is_delete' => 'boolean',
            'otp_expires_at' => 'datetime',
            'last_login_at' => 'datetime',
        ];
    }
    public function apiLogs()
    {
        return $this->hasMany(ApiLog::class);
    }
}
