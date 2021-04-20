<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pemesanan;

class workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'instruktor',
        'gambar',
        'harga',
        'tanggal',
        'deskripsi',
    ];

    public function pemesan()
    {
        return $this->hasMany(pemesanan::class);
    }
}
