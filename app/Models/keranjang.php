<?php

namespace App\Models;

use App\Models\item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        "item_id", "kuantitas"
    ];

    public function item()
    {
        return $this->belongsTo(item::class);
    }
}