<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin_id',
        'no_telp',
        'alamat',
        'nip',
        'pangkat',
        'jabatan'
    ];

    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }
}
