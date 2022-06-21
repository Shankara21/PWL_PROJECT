<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
    public function denda()
    {
        return $this->belongsTo(Denda::class);
    }
}
