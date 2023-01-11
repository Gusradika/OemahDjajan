<?php

namespace App\Models;

use App\Models\employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class role extends Model
{
    use HasFactory;


    public function employee()
    {
        return $this->belongsTo(employee::class);
    }
}