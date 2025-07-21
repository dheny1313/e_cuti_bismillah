<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $primaryKey = 'id_cuti';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_cuti',
        'id_user',
        'alasan',
        'tgl_diajukan',
        'mulai',
        'berakhir',
        'id_status_cuti',
        'perihal_cuti',
        'alasan_verifikasi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function status()
    {
        return $this->belongsTo(StatusCuti::class, 'id_status_cuti');
    }
}
