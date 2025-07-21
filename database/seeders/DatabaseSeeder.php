<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\JenisKelamin;
use App\Models\UserDetail;
use App\Models\UserLevel;
use App\Models\StatusCuti;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jenis Kelamin
        $laki = JenisKelamin::create(['jenis_kelamin' => 'Laki-laki']);
        $perempuan = JenisKelamin::create(['jenis_kelamin' => 'Perempuan']);

        // User Level
        $adminLevel = UserLevel::create(['user_level' => 'Admin']);
        $pegawaiLevel = UserLevel::create(['user_level' => 'Pegawai']);

        // User Detail
        $adminDetail = UserDetail::create([
            'nama_lengkap' => 'Administrator',
            'jenis_kelamin_id' => $laki->id,
            'no_telp' => '081234567890',
            'alamat' => 'Jl. Contoh No. 123',
            'nip' => '1234567890',
            'pangkat' => 'IV/a',
            'jabatan' => 'Admin Sistem',
        ]);

        // User
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'user_level_id' => $adminLevel->id,
            'user_detail_id' => $adminDetail->id,
        ]);

        // Status Cuti
        StatusCuti::insert([
            ['status_cuti' => 'Menunggu Verifikasi'],
            ['status_cuti' => 'Disetujui'],
            ['status_cuti' => 'Ditolak'],
        ]);
    }
}
