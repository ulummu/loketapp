<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['pengunjung_nik', 'diambil', 'nomorAntri', 'status'];

    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'pengunjung_nik', 'nik');
    }
}
