<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create sample products
        Product::create([
            'kode_barang' => 'PRD001',
            'nama_barang' => 'Laptop Asus ROG',
            'deskripsi' => 'Laptop gaming dengan performa tinggi',
            'stok_saat_ini' => 10,
            'stok_minimum' => 5,
        ]);

        Product::create([
            'kode_barang' => 'PRD002',
            'nama_barang' => 'Mouse Gaming',
            'deskripsi' => 'Mouse gaming dengan sensor optical',
            'stok_saat_ini' => 25,
            'stok_minimum' => 10,
        ]);

        Product::create([
            'kode_barang' => 'PRD003',
            'nama_barang' => 'Keyboard Mechanical',
            'deskripsi' => 'Keyboard mechanical dengan switch blue',
            'stok_saat_ini' => 3,
            'stok_minimum' => 5,
        ]);

        Product::create([
            'kode_barang' => 'PRD004',
            'nama_barang' => 'Monitor 24 inch',
            'deskripsi' => 'Monitor LED 24 inch Full HD',
            'stok_saat_ini' => 8,
            'stok_minimum' => 3,
        ]);

        Product::create([
            'kode_barang' => 'PRD005',
            'nama_barang' => 'Headset Gaming',
            'deskripsi' => 'Headset gaming dengan microphone',
            'stok_saat_ini' => 2,
            'stok_minimum' => 5,
        ]);
    }
}
