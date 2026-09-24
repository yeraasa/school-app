<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher; // Memanggil Model Teacher

class TeacherController extends Controller
{
    // READ (index): Menampilkan semua data guru
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    // CREATE (create): Menampilkan form untuk menambah data guru
    public function create()
    {
        return view('teachers.create');
    }

    // CREATE (store): Menyimpan data baru yang dikirim dari form
    public function store(Request $request)
    {
        Teacher::create($request->all());
        return redirect('/teachers')->with('success', 'Data guru berhasil ditambahkan!');
    }

    // UPDATE (edit): Menampilkan form untuk mengedit data guru tertentu
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    // UPDATE (update): Memperbarui data yang sudah ada
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update($request->all());
        return redirect('/teachers')->with('success', 'Data guru berhasil diperbarui!');
    }

    // DELETE (destroy): Menghapus data guru
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('/teachers')->with('success', 'Data guru berhasil dihapus!');
    }
}
