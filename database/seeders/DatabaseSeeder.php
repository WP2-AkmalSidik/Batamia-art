<?php
namespace Database\Seeders;

use App\Models\Kategori;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pengaturan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'role'     => 'admin',
        ]);

        Kategori::create([
            'nama'      => 'Furniture',
            'icon'      => 'fa-eye',
            'deskripsi' => 'salah satu bagian tubuh',
        ]);
        Kategori::create([
            'nama'      => 'Perkakas',
            'icon'      => 'fa-foot',
            'deskripsi' => 'salah satu bagian tubuh',
        ]);

        Pengaturan::create([
            'nama_toko' => 'Batamia Art',
            'provinsi'  => '32',
            'kabupaten' => '32.06',
            'kecamatan' => '32.06.35',
            'kelurahan' => '32.06.35.2002',
            'kode_pos'  => '46175',
            'alamat'    => 'Jln. Sekbrong desa condong jamanis tasikmalaya 46175',
        ]);
    }
}
