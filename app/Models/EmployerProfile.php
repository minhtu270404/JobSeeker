<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployerProfile extends Model
{
    protected $table = 'employer_profiles';

    protected $fillable = [
        'user_id',
        'company_name',
        'website',
        'description',
        'billing_account_id',
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

  
    public function jobs()
    {
        return $this->hasMany(JobWork::class, 'employer_id');
    }
}
