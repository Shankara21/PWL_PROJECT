<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
    public function allData()
    {
        return DB::table('orders')
            ->join('order_details', 'order_id', '=', 'orders.id')
            ->where('orders.status', '=', 1)
            ->get();
    }
}
