<?php

namespace App\Models;

use App\Models\employee;
use App\Models\detailOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order extends Model
{
    use HasFactory;

    protected $fillable = ["jumlah_pesanan", "grand_total", "status", "employee_id", "nama_pemesan", "total_pesanan"];

    protected $guarded = ["id"];

    public function employee()
    {
        return $this->belongsTo(employee::class);
    }

    public function detailOrder()
    {
        return $this->belongsTo(detailOrder::class);
    }
}