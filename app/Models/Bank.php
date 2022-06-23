<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'banks';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
    public function denda()
    {
        return $this->hasMany(Denda::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
