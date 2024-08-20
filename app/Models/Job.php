<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

public function groups()
{
    return $this->hasMany(Group::class);
}

    public function asks()
    {
        return $this->hasMany(Ask::class);
    }
}
