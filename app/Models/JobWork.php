<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobWork extends Model
{
    use HasFactory;

    protected $table = 'job_works';

    protected $fillable = [
        'employer_id',
        'title',
        'slug',
        'type',
        'employment_type',
        'location',
        'salary_min',
        'salary_max',
        'currency',
        'description',
        'requirements',
        'status',
        'published_at',
        'expires_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'expires_at'   => 'datetime',
        'salary_min'   => 'decimal:2',
        'salary_max'   => 'decimal:2',
    ];

  
    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }
}
