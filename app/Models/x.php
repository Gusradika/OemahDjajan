<?php

namespace App\Models;

use App\Models\item;
use App\Models\order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class detail_order extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->hasOne(order::class);
    }

    public function item()
    {
        return $this->hasOne(item::class);
    }
}