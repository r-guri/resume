<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function getCourses(Request $request)
    {
        $qualificationId = $request->input('qualification_id');
        $courses = Course::where('qualification_id', $qualificationId)->get(['id', 'name']);
        return response()->json($courses);
    }
}
