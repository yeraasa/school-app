<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Menampilkan daftar semua siswa.
     * Method: GET
     * URL: /api/students
     */
    public function index()
    {
        $students = Student::with('schoolClass')->get();
        return response()->json($students);
    }

    /**
     * Menyimpan data siswa baru.
     * Method: POST
     * URL: /api/students
     */
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
        
        $student = Student::create($request->all());
        return response()->json($student, 201); // 201 = Created
    }

    /**
     * Menampilkan detail satu siswa.
     * Method: GET
     * URL: /api/students/{id}
     */
    public function show(Student $student)
    {
        $student->load('schoolClass');
        return response()->json($student);
    }

    /**
     * Mengubah data siswa yang sudah ada.
     * Method: PUT/PATCH
     * URL: /api/students/{id}
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama' => 'required',
            'school_class_id' => 'required|exists:school_classes,id',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required|email'
        ]);

        $student->update($request->all());
        return response()->json($student);
    }

    /**
     * Menghapus data siswa.
     * Method: DELETE
     * URL: /api/students/{id}
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(null, 204); // 204 = No Content
    }
}
