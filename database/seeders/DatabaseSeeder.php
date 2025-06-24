<?php
namespace Database\Seeders;

use App\Models\Alamat;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bank;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\KeranjangProduk;
use App\Models\Order;
use App\Models\OrderProduk;
use App\Models\Pengaturan;
use App\Models\Produk;
use App\Models\Review;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $faker = Faker::create();

        User::create([
            'nama'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'role'     => 'admin',
        ]);

        User::create([
            'nama'     => 'ari',
            'email'    => 'arizainalf@gmail.com',
            'password' => bcrypt('123123123'),
            'role'     => 'user',
        ]);

        User::factory(10)->create();

        // Kategori
        foreach (range(1, 5) as $i) {
            Kategori::create([
                'nama'      => ucfirst($faker->unique()->word),
                'icon'      => 'fa-box',
                'deskripsi' => $faker->sentence,
            ]);
        }

        // Produk
        foreach (range(1, 20) as $i) {
            Produk::create([
                'kategori_id' => Kategori::inRandomOrder()->first()->id,
                'nama'        => $faker->unique()->words(2, true),
                'deskripsi'   => $faker->paragraph,
                'harga'       => $faker->numberBetween(45000, 500000),
                'berat'       => $faker->numberBetween(150, 2500),
                'stok'        => $faker->numberBetween(10, 100),
                'image'       => getUiAvatar($faker->name),
                'status'      => true,
            ]);
        }

        // Bank
        foreach (range(1, 3) as $i) {
            Bank::create([
                'nama_bank' => strtoupper($faker->word),
                'no_akun'   => $faker->bankAccountNumber,
                'nama_akun' => $faker->name,
                'jenis'     => $faker->randomElement(['bank', 'e-wallet']),
                'status'    => true,
                'logo'      => null,
            ]);
        }

        // Alamat
        foreach (User::all() as $user) {
            Alamat::create([
                'user_id'        => $user->id,
                'nama'           => $faker->name,
                'nomor_hp'       => $faker->phoneNumber,
                'alamat_lengkap' => $faker->address,
                'provinsi'       => 'DKI JAKARTA',
                'kota'           => 'JAKARTA PUSAT',
                'kecamatan'      => 'GAMBIR',
                'kelurahan'      => 'GAMBIR',
                'kode_pos'       => '17601',
            ]);
        }

        // Keranjang dan KeranjangProduk
        foreach (User::all() as $user) {
            $cart = Keranjang::create(['user_id' => $user->id]);
            foreach (range(1, 3) as $i) {
                KeranjangProduk::create([
                    'keranjang_id' => $cart->id,
                    'produk_id'    => Produk::inRandomOrder()->first()->id,
                    'kuantitas'    => $faker->numberBetween(1, 5),
                ]);
            }
        }

        $status = ['belum_dibayar', 'dibayar', 'diproses', 'dikirim', 'selesai', 'dibatalkan', 'ditolak'];
        // Order dan OrderProduk
        foreach (User::all() as $user) {
            $alamat = $user->alamat()->inRandomOrder()->first();
            $bank   = Bank::inRandomOrder()->first();
            $order  = Order::create([
                'user_id'          => $user->id,
                'total_harga'      => $faker->numberBetween(45000, 5000000),
                'bank_id'          => $bank->id,
                'alamat_id'        => $alamat?->id,
                'bukti_pembayaran' => null,
                'kurir'            => 'J&T',
                'resi'             => strtoupper($faker->bothify('??######')),
                'status'           => $faker->randomElement($status),
            ]);

            foreach (range(1, 2) as $i) {
                $produk = Produk::inRandomOrder()->first();
                $qty    = $faker->numberBetween(1, 3);
                OrderProduk::create([
                    'order_id'    => $order->id,
                    'produk_id'   => $produk->id,
                    'kuantitas'   => $qty,
                    'total_harga' => $produk->harga * $qty,
                ]);
            }
        }

        // Reviews
        foreach (Order::all() as $order) {
            Review::create([
                'user_id'   => User::inRandomOrder()->first()->id,
                'order_id'  => $order->id,
                'produk_id' => Produk::inRandomOrder()->first()->id,
                'rating'    => $faker->numberBetween(1, 5),
                'komen'     => $faker->sentence,
            ]);
        }

        Pengaturan::create([
            'nama_toko' => 'Batamia Art',
            'provinsi'  => 'Jawa Barat',
            'kota'      => 'Kab. Tasikmalaya',
            'kecamatan' => 'Jamanis',
            'kelurahan' => 'condong',
            'kode_pos'  => '77376',
            'alamat'    => 'Jln. Sekbrong desa condong jamanis tasikmalaya 46175',
        ]);
    }
}
