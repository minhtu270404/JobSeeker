<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GigOffer extends Model
{
    protected $table = 'gig_offers';

    protected $fillable = [
        'gig_id',
        'contractor_id',
        'proposed_price_cents',
        'proposed_deadline',
        'message',
        'status'
    ];

    protected $casts = [
        'proposed_price_cents' => 'integer',
        'proposed_deadline'    => 'datetime',
    ];

  
    public function gig()
    {
        return $this->belongsTo(Gig::class, 'gig_id');
    }

}
