<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'multi_certificate' => 'array',
        'courses_in_special' => 'array',
        'last_job' => 'array',
        'prev1_job' => 'array',
        'prev2_job' => 'array',
        'lang' => 'array',
        'office' => 'array',
        'adobe' => 'array',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
