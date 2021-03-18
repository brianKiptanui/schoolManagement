<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonRequest;
use App\Http\Requests\CreateSubjectRequest;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClassroomController extends Controller
{
    public function createLesson(CreateLessonRequest $request)
    {


        $lesson = new Lesson;

        $lesson->teacher_name = $request->teacher_name;
        $lesson->class_name = $request->class_name;
        $lesson->subject = $request->subject;
        $lesson->time = $request->time;

        $lesson->save();

        return response([
            'success' => true,
            'data' => $lesson->toArray()
        ], Response::HTTP_CREATED);
    }

    public function allLessons()
    {
        $allLessons = Lesson::select('teacher_name', 'class_name', 'subject')->get();
        return response([
            'data' => $allLessons->toArray()
        ]);
    }

    public function createSubject(CreateSubjectRequest $request)
    {
        $lesson = new Lesson;
        $lesson->teacher_name = $request->teacher_name;
        $lesson->s_name = $request->s_name;


        $lesson->save();

        return response([
            'success' => true,
            'data' => $lesson->toArray()
        ], Response::HTTP_CREATED);
    }

    public function allSubjects()
    {
        $allSubjects = Subject::select('teacher_name', 'class_name', 'subject')->get();
        return response([
            'data' => $allSubjects->toArray()
        ]);
    }
}
