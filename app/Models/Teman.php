<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teman extends Model
{
    use HasFactory;
    protected $table = 'teman';
    protected $fillable = ['nama', 'alamat', 'pekerjaan'];

    public function hutangs()
    {
        return $this->hasMany(Utang::class);
    }
}
