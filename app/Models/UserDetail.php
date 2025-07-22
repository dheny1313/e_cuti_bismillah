<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'user_id',
        'jenis_kelamin_id',
        'no_telp',
        'alamat',
        'nip',
        'pangkat',
        'jabatan'
    ];

    
    public function jenis_kelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
