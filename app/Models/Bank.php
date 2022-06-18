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
        $this->hasMany(Order::class);
    }
}
