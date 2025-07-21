<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKelamin extends Model
{
    use HasFactory;
    protected $fillable = ['jenis_kelamin'];
}
