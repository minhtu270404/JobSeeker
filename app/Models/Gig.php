<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    protected $table = 'gigs';

    protected $fillable = [
        'client_id',
        'title',
        'description',
        'price_cents',
        'currency',
        'deliverables',
        'status',
        'visibility',
    ];

   
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

   
    public function offers()
    {
        return $this->hasMany(GigOffer::class, 'gig_id');
    }
}
