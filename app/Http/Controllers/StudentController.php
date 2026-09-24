<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('schoolClass')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classes = SchoolClass::all();
        return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students',
            'nama' => 'required',
            'school_class_id' => 'required|exists:school_classes,id',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:students'
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show(Student $student)
    {
        // Method ini tidak digunakan di alur utama, bisa dikosongkan atau diisi logika detail
    }

    public function edit(Student $student)
    {
        $classes = SchoolClass::all();
        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'school_class_id' => 'required|exists:school_classes,id',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required|email'
        ]);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
