<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
   public function all(){

    $course = Course::all();

    return view('admin.course.all_course',compact('course'));
   }

    public function add()
    {
        return view('admin.course.add_course');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',

        ]);

        Course::insert([
            'instructor_id' =>Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Course Created successfuly',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    public function edit($id){
       $course= Course::findORFail($id);
        return view('admin.course.edit_course',compact('course'));
    }

    public function update(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',

        ]);

        $id = $request->id;

        Course::findOrfail($id)->update([
            'instructor_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Course Updated successfuly',
            'alert-type' => 'success',
        );

        return redirect()->route('all.course')->with($notification);
    }

    public function delete($id){

        Course::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Course Updated successfuly',
            'alert-type' => 'success',
        );
        return redirect()->back()->with('$notification');
    }

    //Lesson view function

    public function AllLessonAjax($id)
    {
 
        $lessons = Lesson::where('course_id', $id)->get();


        return response()->json(array(
            'lessons' =>$lessons,
        ));
    }
}
