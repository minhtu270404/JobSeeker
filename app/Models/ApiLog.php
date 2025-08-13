<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'ip',
        'method',
        'url',
        'payload',
        'status_code',
        'duration',
    ];

    protected $casts = [
        'payload' => 'array',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
