<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonRequest;
use App\Http\Requests\CreateSubjectRequest;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class ClassroomController extends Controller
{
    public function createLesson(CreateLessonRequest $request)
    {

        if (! Gate::allows('store-lesson')) {
            abort(403);
        }

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
        if (! Gate::allows('show-lesson')) {
            abort(403);
        }

        $allLessons = Lesson::select('teacher_name', 'class_name', 'subject')->get();
        return response([
            'data' => $allLessons->toArray()
        ]);
    }

    public function createSubject(CreateSubjectRequest $request)
    {

        if (! Gate::allows('store-subject')) {
            abort(403);
        }

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
        if (! Gate::allows('show-subject')) {
            abort(403);
        }

        $allSubjects = Subject::select('teacher_name', 'class_name', 'subject')->get();
        return response([
            'data' => $allSubjects->toArray()
        ]);
    }
}
