<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggal',
        'judul',
        'rekap',
    ];

    //satu presensi diisi oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
