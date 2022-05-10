<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = ['nik', 'nama', 'email', 'password'];

    // public function antrian()
    // {
    //     return $this->hasMany(Antrian::class);
    // }
}
