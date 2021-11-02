<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::All();

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];


        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $data = [
            'message' => 'Student is created',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    #method show

    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is not found'
            ];

            return response()->json($data, 404);
        }
    }

    #method update

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($student) {

            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];

            $student->update($input);

            $data = [
                'messange' => 'Data is updated',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is not found'
            ];

            return response()->json($data, 404);
        }
    }

    #method delete

    public function destroy($id)
    {

        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'message' => 'Data is deleted'
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is not found'
            ];

            return response()->json($data, 404);
        }
    }
}
