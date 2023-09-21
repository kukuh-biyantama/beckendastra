<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\book;
use App\Models\review;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ],
        );
        user::create(
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
            ]
        );
        // Buat data buku contoh
        book::create(
            [
                'title' => 'Judul Buku 1',
                'id_kategori' => 1,
                'author' => 'Penulis 1',
                'description' => 'Deskripsi buku 1',
                'price' => 19.99,
                'published_date' => '2023-01-15',
                'image' => 'image1.jpg',
            ],
        );

        review::create([
            'book_id' => 1,
            'user_name' => 'User1',
            'rating' => 4,
            'comment' => 'Ulasan buku 1',
        ]);
        transaksi::create(
            [
                'id_books' => 1,
                'id_users' => 1,
                'nama_pembeli' => 'Pembeli1',
                'alamat_pengiriman' => 'xx',
                'total_buku' => 3,
                'biaya' => 59.97,
            ]
        );
    }
}
