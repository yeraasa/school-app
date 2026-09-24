<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker; // Import class Faker

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Membuat instance Faker dengan lokal Indonesia

        for ($i = 0; $i < 10; $i++) { // Loop untuk membuat 10 data guru dummy
            DB::table('teachers')->insert([ // Menggunakan DB facade untuk insert data
                'nip' => $faker->unique()->numberBetween(1000000000000000, 9999999999999999), // contoh untuk 16 digit angka
                'nama' => $faker->name, // Nama acak
                'bidang_studi' => $faker->randomElement(['Matematika', 'Bahasa Indonesia', 'Produktif RPL', 'Basis Data', 'Pendidikan Agama Islam', 'Bahasa Inggris', 'Olahraga', 'Sejarah']), // Bidang studi acak
                'email' => $faker->unique()->safeEmail, // Email unik
                'created_at' => now(), // Waktu dibuat sekarang
                'updated_at' => now(), // Waktu diperbarui sekarang
            ]);
        }
    }
}
