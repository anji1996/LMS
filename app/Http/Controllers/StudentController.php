<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function dashboard()
    {
        return view('student.dashboard');
    }

    public function enroled(){
        $courses = Enrollment::all();
        return view('student.enrole.enrole_all', compact('courses'));
    }

    public function add()
    {
        $id = Auth::user()->id;
        $courses = Course::findORfail($id)->get();

        return  view('student.enrole.enrole_add', compact('courses'));
    }

    public function store(Request $request){
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

    //Lesson view function

    public function AllLessonAjax($id)
    {

        $lessons = Lesson::where('course_id', $id)->get();
        return response()->json(array(
            'lessons' => $lessons,
        ));
    }

    
}
