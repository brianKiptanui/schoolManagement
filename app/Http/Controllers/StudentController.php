<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudentResource::collection(Student::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {


        $student = new Student;

        $student->name = $request->name;
        $student->email = $request->email;
        $student->class = $request->class;
        $student->admission_no = $request->admission_no;
        $student->save();

        return response([
            'data' => new StudentResource($student)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student = Student::find($request->id);

        if(!$student){
            return response()->json([
                'success' => false,
                'data' => 'Student with not found'
            ]);
        }
         $studentUpdate = $student->fill($request->all())->save();

         if($studentUpdate){
            return response()->json([
                'success' => true,
                'data' => 'Student details updated successfully!'
            ]);
         }else{
            return response()->json([
                'success' => false,
                'data' => 'Student details not updated!'
            ]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();

        return response( null , Response::HTTP_NO_CONTENT);
    }
}
