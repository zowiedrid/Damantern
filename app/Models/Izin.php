<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggalmulai',
        'jammulai',
        'tanggalselesai',
        'jamselesai',
        'keperluan',
        'status',
    ];

    //satu presensi diisi oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
