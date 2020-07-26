<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Student;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index()
    {
        $studentsQuery = Student::with(['genre','identification_type','career']);
        return DataTables::of($studentsQuery)->toJson();
    }


    /**
     * Store a newly created student in storage.
     */
    public function store(StudentRequest $request)
    {
        $newStudent = Student::create($request->validated());
    
        return response()->json([
            'success'=>true,
            'message' => 'Usuario creado exitosamente.',
            'stored'=> $newStudent
        ],201);
    }


    /**
     * Display the specified student.
     */
    public function show($id)
    {
        $student = Student::with(['genre','identification_type','career'])->findOrFail($id);
        return response()->json($student,200);
    }


    /**
     * Update the specified student in storage.
     */
    public function update(StudentRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->validated());
    
        return response()->json([
            'success'=>true,
            'message' => 'Usuario editado exitosamente.',
            'updated'=> $student
        ],200);
    }


    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    
        return response()->json([
            'success'=>true,
            'message' => 'Usuario eliminado exitosamente.',
            'deleted'=> $student
        ],200);
    }
}
