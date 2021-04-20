<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Workshop;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'tlp',
        'catatan',
    ];

    public function workshop()
    {
        return $this->belongsTo(workshop::class);
    }
}
