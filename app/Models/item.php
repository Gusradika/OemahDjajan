<?php

namespace App\Models;

use App\Models\kategori;
use App\Models\keranjang;
use App\Models\detailOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class item extends Model
{
    use HasFactory;

    protected $fillable = ["kategori_id", "nama", "netto", "gambar", "excerpt", "deskripsi", "harga"];
    protected $guarded = ["id"];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    public function detailOrder()
    {
        return $this->hasOne(detailOrder::class);
    }
    // cara baca : 1 item di miliki oleh detailOrder


    public function keranjang()
    {
        return $this->hasOne(keranjang::class);
    }
}