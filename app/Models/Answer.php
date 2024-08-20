<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function ask()
    {
        return $this->belongsTo(Ask::class);
    }
}
