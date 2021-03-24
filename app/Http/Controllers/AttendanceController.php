<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Classlist;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\ListRequest;

class AttendanceController extends Controller
{
    public function list()
    {
        $classlist = Classlist::select('class_name', 'student_name', 'admission_no')->get();
        return response([
            'data' => $classlist->toArray()
        ]);
    }

    public function listCreated(ListRequest $request)
    {
        $list = new Classlist;

        $list->class_name = $request->class_name;
        $list->student_name = $request->student_name;
        $list->admission_no = $request->admission_no;

        $list->save();

        return response([
            'success' => true,
            'data' => $list->toArray()
        ], Response::HTTP_CREATED);
    }

    public function attendanceList(AttendanceRequest $request)
    {

        $attendanceList = new Attendance;

        $attendanceList -> student_name = $request->student_name;
        $attendanceList -> admission_no = $request->admission_no;
        $attendanceList -> attendance_status = $request->attendance_status;
        $attendanceList -> day = $request->day;
       // $attendanceList = json_decode($request->attendance_status, true;

        $attendanceList->save();

        return response([
            'success' => true,
            'data' => $attendanceList ->toArray()
        ], Response::HTTP_CREATED);
    }

    public function attendance()
    {
        $attendance = Attendance::all();

        return response([
            'data' => $attendance->toArray()
        ]);
    }
}
