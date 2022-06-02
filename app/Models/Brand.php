<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table = 'brands';
    protected $guarded = ['id'];
=======

    protected $guarded = ['id'];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }
>>>>>>> eaab769838d4889914046a4431078ca5eff6a800
}
