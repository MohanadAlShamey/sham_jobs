<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts=[
        'options' => 'array'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
