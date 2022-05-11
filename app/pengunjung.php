<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengunjung extends Model
{
    // use HasFactory;

    protected $fillable = ['nik', 'nama'];

    public function antrian()
    {
        return $this->hasMany(Antrian::class);
    }
}
