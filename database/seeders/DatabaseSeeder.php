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
                'harga'       => $faker->randomFloat(2, 10000, 500000),
                'berat'       => $faker->randomFloat(2, 0.1, 3.0),
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
                'provinsi'       => 'Jawa Barat',
                'kota'           => 'Bandung',
                'kecamatan'      => 'Coblong',
                'kode_pos'       => $faker->postcode,
            ]);
        }

        // Keranjang dan KeranjangProduk
        foreach (User::all() as $user) {
            $cart = Keranjang::create(['user_id' => $user->id]);
            foreach (range(1, 3) as $i) {
                KeranjangProduk::create([
                    'cart_id'   => $cart->id,
                    'produk_id' => Produk::inRandomOrder()->first()->id,
                    'kuantitas' => $faker->numberBetween(1, 5),
                ]);
            }
        }

        // Order dan OrderProduk
        foreach (User::all() as $user) {
            $alamat = $user->alamat()->inRandomOrder()->first();
            $bank   = Bank::inRandomOrder()->first();
            $order  = Order::create([
                'user_id'          => $user->id,
                'total_harga'      => $faker->randomFloat(2, 50000, 500000),
                'bank_id'          => $bank->id,
                'alamat_id'        => $alamat?->id,
                'bukti_pembayaran' => null,
                'kurir'            => 'J&T',
                'resi'             => strtoupper($faker->bothify('??######')),
                'status'           => 'pending',
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
        foreach (range(1, 30) as $i) {
            Review::create([
                'user_id'   => User::inRandomOrder()->first()->id,
                'produk_id' => Produk::inRandomOrder()->first()->id,
                'rating'    => $faker->numberBetween(1, 5),
                'komen'     => $faker->sentence,
            ]);
        }

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
