<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class EnrolleController extends Controller
{
    public function all()
    {

        $userId = Auth::user()->id;


        $courses = Enrollment::where('student_id', $userId)->with('course')->get();


        return view('student.enrole.enrole_all', compact('courses'));
    }

    public function add()
    {

        $courses = Course::all();
        return  view('student.enrole.enrole_add',compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',

        ], [
            'course_id.required' => 'The Course field is required.',
        ]);

        Enrollment::insert([
            'student_id' => Auth::user()->id,
            'course_id' => $request->course_id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Course Enroled successfuly',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

}
