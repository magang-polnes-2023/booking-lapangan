<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = [
        'user_id',
        'lapangan_id',
        'no_telp',
        'tanggal',
        'durasi',
        'start_time',
        'end_time',
        'bukti',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lapangan()
    {
        return $this->belongsTo(lapangan::class);
    }
}
