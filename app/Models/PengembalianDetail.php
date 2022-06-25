<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pengembalianDetails';
    protected $primaryKey = 'id';

    public function pengembalian()
    {
        return $this->belongsTo(Pengembalian::class);
    }
    public function denda()
    {
        return $this->hasOne(Denda::class);
    }
}
