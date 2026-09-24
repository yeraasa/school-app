<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker; // Import class Faker

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Membuat instance Faker dengan lokal Indonesia

        for ($i = 0; $i < 20; $i++) { // Loop untuk membuat 20 data siswa dummy
            DB::table('students')->insert([ // Menggunakan DB facade untuk insert data
                'nis' => $faker->unique()->numberBetween (100000000, 999999999),
                'nama' => $faker->name, // Nama acak
                'tanggal_lahir' => $faker->date('Y-m-d'),
                'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->address, // Alamat acak
                'email' => $faker->unique()->safeEmail, // Email unik
                'created_at' => now(), // Waktu dibuat sekarang
                'updated_at' => now(), // Waktu diperbarui sekarang
            ]);
        }
    }
}

