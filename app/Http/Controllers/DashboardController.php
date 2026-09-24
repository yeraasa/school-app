<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $namaAdmin = "Bapak Sulthan"; // Contoh data admin
        $jumlahSiswa = 1009; // Contoh data
        $jumlahGuru = 79; // Contoh data

        return view('dashboard', compact('namaAdmin', 'jumlahSiswa', 'jumlahGuru'));
    }

}
