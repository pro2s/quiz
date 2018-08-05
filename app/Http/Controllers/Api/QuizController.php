<?php

namespace App\Http\Controllers\Api;

use App\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function index()
    {
        return Quiz::where('active', true)->get();
    }
 
    public function show($slug)
    {
        return Quiz::where('slug', $slug)->where('active', true)->first();
    }
}
