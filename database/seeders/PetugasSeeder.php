<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // 1 akun admin BPBD (email & password tetap)
        User::firstOrCreate(
            ['email' => 'admin@bpbd.bandung.go.id'],
            [
                'name'     => 'Admin BPBD Kabupaten Bandung',
                'password' => Hash::make('admin12345'),
            ]
        );

        // 6 akun petugas dummy (Faker id_ID, password di-hash)
        for ($i = 0; $i < 6; $i++) {
            User::create([
                'name'     => $faker->name(),
                'email'    => $faker->unique()->safeEmail(),
                'password' => Hash::make('petugas123'),
            ]);
        }
    }
}