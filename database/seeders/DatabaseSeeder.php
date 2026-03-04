<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Walikelas;
use App\Models\Mapel;
use App\Models\Nilai;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seeder untuk Walikelas
        $walikelas = Walikelas::create([
            'nama' => 'Budi Santoso',
            'kelas' => 'XII IPA 1',
        ]);

        // Seeder untuk Mapel
        $mapel = Mapel::create([
            'nama' => 'Matematika',
            'kode' => 'MTK01',
        ]);

        // Seeder untuk Siswa
        $siswa = Siswa::create([
            'nama' => 'Andi Wijaya',
            'nis' => '12345',
            'nisn' => '9876543210',
            'kelas' => 'XII IPA 1',
            'walikelas_id' => $walikelas->id,
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2007-01-01',
            'alamat' => 'Jl. Merdeka No.1',
            'kontak' => '08123456789',
            'nama_ibu' => 'Siti Aminah',
            'nama_ayah' => 'Joko Wijaya',
            'jenis_kelamin' => 'L',
        ]);

        // Seeder untuk Nilai
        Nilai::create([
            'siswa_id' => $siswa->id,
            'mapel_id' => $mapel->id,
            'nilai' => 90,
        ]);
    }
}
