<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    protected $table = 'candidate_profiles'; // tên bảng
    protected $fillable = [
        'user_id',
        'headline',
        'summary',
        'location',
        'skills',
        'resume_file_id',
        'visibility',
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'candidate_id');
    }
}
