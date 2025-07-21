<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JatahCuti extends Model
{
    protected $table = 'jatah_cuti';

    protected $fillable = [
        'id_user',
        'tahun',
        'jumlah_cuti'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
