<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class JobApplication extends Model
{
    protected $table = 'job_applications';

    protected $fillable = [
        'candidate_id',
        'cover_letter',
        'resume_file_id',
        'status',
        'applied_at',
    ];

    /**
     * Quan hệ với CandidateProfiles (ứng viên nộp đơn)
     */
    public function candidate()
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_id');
    }

}
