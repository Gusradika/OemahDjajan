<?php

namespace App\Models;

use App\Models\item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->hasOne(item::class);
    }
}
