<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function dashboard(){
    return view('admin.dashboard');
   }

public function logout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
}

    public function studentEnroled()
    {
        $students = User::where('id', '!=', '1')->latest()->get();
        return view('admin.student.all_student', compact('students'));
    }


}
