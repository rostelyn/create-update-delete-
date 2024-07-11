<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->section = $request->section;
        $student->course = $request->course;
        $student->save();

        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->section = $request->section;
        $student->course = $request->course;
        $student->save();

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}
