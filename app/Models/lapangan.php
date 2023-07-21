<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lapangan extends Model
{
    use HasFactory;
    protected $table = 'lapangan';

    protected $fillable = [
        'gambar',
        'nama',
        'deskripsi',
        'harga',
    ];

    public function booking()
    {
        return $this->hasMany(booking::class);
    }
}
