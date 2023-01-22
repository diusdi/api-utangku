<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utang extends Model
{
    use HasFactory;

    protected $table = 'utang';

    protected $fillable = ['id_teman', 'nominal', 'alasan', 'tanggal_peminjaman', 'tanggal_lunas', 'keterangan_lunas'];


    public function teman()
    {
        return $this->belongsTo(Teman::class, 'id_teman');
    }
}
