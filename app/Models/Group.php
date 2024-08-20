<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
