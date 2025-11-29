<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Material;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun ADMIN
        User::create([
            'name' => 'Admin Pabrik',
            'email' => 'admin@textille.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Akun MANAGER
        User::create([
            'name' => 'Pak Manajer',
            'email' => 'manager@textille.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
        ]);

        // 3. Akun STAFF GUDANG
        User::create([
            'name' => 'Staff Gudang A',
            'email' => 'staff@textille.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);

        // 4. Akun OPERATOR
        User::create([
            'name' => 'Operator Mesin 1',
            'email' => 'operator@textille.com',
            'password' => Hash::make('password'),
            'role' => 'operator',
        ]);

        // Data Awal Bahan & Produk
        Material::create(['name' => 'Benang Sutra', 'unit' => 'kg', 'stock' => 50]);
        Material::create(['name' => 'Pewarna Biru', 'unit' => 'liter', 'stock' => 20]);
        Product::create(['name' => 'Kain Sutra Premium', 'stock' => 0]);
    }
}