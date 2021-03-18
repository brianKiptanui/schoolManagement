<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TeacherResource::collection(Teacher::all());
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
    public function store(TeacherRequest $request)
    {


        $teacher = new Teacher;

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->pwd = $request->pwd;
        $teacher->subject = $request->subject;
        $teacher->role = $request->role;
        $teacher->tsc_no = $request->tsc_no;
        $teacher->save();

        return response([
            'data' => new TeacherResource($teacher)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherRequest $teacher)
    {
        return new TeacherResource($teacher);
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
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($request->id);

        if(!$teacher){
            return response()->json([
                'success' => false,
                'data' => 'teacher with not found'
            ]);
        }
         $teacherUpdate = $teacher->fill($request->all())->save();

         if($teacherUpdate){
            return response()->json([
                'data' => new TeacherResource($teacher)
            ]);
         }else{
            return response()->json([
                'success' => false,
                'data' => 'teacher$teacher details not updated!'
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
        $teacher = Teacher::find($id);

        $teacher->delete();

        return response( null , Response::HTTP_NO_CONTENT);
    }
}
