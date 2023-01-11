<?php

namespace App\Models;

use App\Models\item;
use App\Models\order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class detailOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id", "item_id", "kuantitas", "total"
    ];

    protected $guarded = [
        "id"
    ];

    public function order()
    {
        return $this->hasMany(order::class);
    }
    // artinya Order->detailOrder
    // cara baca 

    public function item()
    {
        return $this->belongsTo(item::class);
    }
    // cara baca : detailOrder dimiliki oleh item
    // Artinya bisa dibuat seperti " detailOrder->item->nama"
}