<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{

    public function updateProgress(Request $request)
    {
        $progressId = $request->input('progress_id');
        $isCompleted = $request->input('is_completed');


        $progress = Progress::find($progressId);

        if ($progress) {
            $progress->is_completed = $isCompleted;
            $progress->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

}
