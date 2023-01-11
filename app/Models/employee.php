<?php

namespace App\Models;

use App\Models\role;
use App\Models\order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class employee extends Model
{
    use HasFactory;



    public function role()
    {
        return $this->hasOne(role::class);
    }

    public function order()
    {
        return $this->hasMany(order::class);
    }
}