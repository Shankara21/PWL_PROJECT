<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderDetails()
    {
        return $this->belongsTo(OrderDetail::class);
    }
    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class);
    }
    public function pengembalianDetails()
    {
        return $this->belongsTo(PengembalianDetail::class);
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
