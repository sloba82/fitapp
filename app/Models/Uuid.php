<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uuid extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid'
    ];

    public function model()
    {
        return $this->morphTo();
    }



}
