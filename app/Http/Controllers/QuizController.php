<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use App\Http\Requests\QuizRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::paginate(15);
        return view('admin.quizzes.index', ['quizzes' => $quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quiz = new Quiz();
        return view('admin.quizzes.edit', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        $quiz = new Quiz();
        $data = $request->validated();
        $quiz->fill($data);
        $quiz->save();
        return redirect()->route('quizzes.show', [$quiz]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        $questions = $quiz->questions;
        return view('admin.quizzes.show', compact('quiz', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(QuizRequest $request, Quiz $quiz)
    {
        $data = $request->validated();
        $quiz->update($data);
        return redirect()->route('quizzes.edit', [$quiz]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }

    
    /**
     * Toggle active state the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function toggle(Quiz $quiz)
    {
        $quiz->active = !$quiz->active;
        $quiz->save();
        return Response::make('', "200");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function deleteQuestion(Quiz $quiz, Question $question)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function addQuestion(Quiz $quiz, Question $question)
    {
        //
    }


}
