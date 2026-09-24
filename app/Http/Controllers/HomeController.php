<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // Kita akan kembalikan view 'welcome' dulu
    }

    public function about() // Method baru untuk halaman About
    {
        $namaAplikasi = "Aplikasi Web Sekolah";
        $pengembang = "Sulthan Alawy Shihab";
        $tahun = 2025;

        // Mengirim banyak variabel menggunakan fungsi compact()
        // compact('namaAplikasi', 'pengembang', 'tahun') akan menjadi
        // ['namaAplikasi' => $namaAplikasi, 'pengembang' => $pengembang, 'tahun' => $tahun]
        return view('about', compact('namaAplikasi', 'pengembang', 'tahun'));
    }

}
