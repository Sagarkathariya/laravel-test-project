<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        // Fetch all students from the database
        $students = Student::all();

        // Return the list view (assuming it's in resources/views/home/index.blade.php)
        return view('index', compact('students'));
    }

    //// Show the form
    public function create()
    {
        return view('home');
    }

    // Store the data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'     => 'required|string|max:255',
            'phone_number'  => 'required|string|max:10',
            'email'         => 'required|email|unique:students',
            'date_of_birth' => 'required|date',
            'address'       => 'required|string|max:255',
            'status'        => 'required|string',
            'course'        => 'required|string',
        ]);

        Student::create($validated);

        return redirect()->back()->with('success', 'Student registered successfully!');
    }

    public function show(Student $student)
    {
        $students = Student::where('id', $student->id)->get();
        // Return the list view (assuming it's in resources/views/home/index.blade.php)
        return view('index', compact('students'));
    }
}
