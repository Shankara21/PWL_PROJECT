<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function denda()
    {
        return $this->belongsTo(Denda::class);
    }
    public function pengembalianDetails()
    {
        return $this->hasMany(PengembalianDetail::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
