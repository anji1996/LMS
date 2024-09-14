<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LessonController extends Controller
{
    public function all()
    {

        $lesson = Lesson::all();
        return view('admin.lesson.all_lesson', compact('lesson'));
    }

    public function add()
    {
        $course = Course::all();
        return view('admin.lesson.add_lesson', compact('course'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                'course_id' => 'required',

            ],
            [
                'course_id.required' => 'The Course field is required.',
            ]
        );

        Lesson::insert([
            'title' => $request->title,
            'content' => $request->content,
            'course_id' => $request->course_id,
            'created_at' =>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Lesson Created successfuly',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }


    public function edit($id)
    {
        $lesson = Lesson::findORFail($id);
        $course = Course::all();
        return view('admin.lesson.edit_lesson', compact('lesson','course'));
    }

    public function update(Request $request)
    {

        $id = $request->id;

        lesson::findOrfail($id)->update([

            'title' => $request->title,
            'content' => $request->content,
            'course_id' => $request->course_id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Lesson Updated successfuly',
            'alert-type' => 'success',
        );

        return redirect()->route('all.lesson')->with($notification);
    }

    public function delete($id)
    {

        Lesson::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Lesson Deleted successfuly',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


}
