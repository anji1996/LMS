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


    //Lesson view function

    public function AllLessonAjax($id)
    {

        $lessons = Lesson::where('course_id', $id)->get();
        return response()->json(array(
            'lessons' => $lessons,
        ));
    }

    public function logout(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
