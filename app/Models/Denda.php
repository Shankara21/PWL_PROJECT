<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $table = 'dendas';
    protected $primaryKey = 'id';

    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class, 'order_detail_id');
    }
    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class);
    }
    public function pengembalianDetail()
    {
        return $this->belongsTo(PengembalianDetail::class, 'pengembalianDetail_id');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
