<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ApiStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return response()->json($student);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $validated = Validator::make($request->all(), [
            'full_name'     => 'required|string|max:255',
            'phone_number'  => 'required|string|max:10',
            'email'         => 'required|email|unique:students',
            'date_of_birth' => 'required|date',
            'address'       => 'required|string|max:255',
            'status'        => 'required|boolean',
            'course'        => 'required|string',
        ]);

        if ($validated->fails()) {
            return response()->json($validated->messages(), 400);
        }

        $data = [
            'full_name'     => $request->full_name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'address'       => $request->address,
            'status'        => $request->status,
            'course'        => $request->course,
        ];
        DB::beginTransaction();
        try {
            Student::create($data);
            DB::commit();
            return response()->json(['message' => 'Student created successfully', 'data' => $data], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Failed to create student', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
