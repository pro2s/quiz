<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Question;
use App\Quiz;
use Illuminate\Support\Facades\Response;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $quizzes = Quiz::paginate(15);

        return view('admin.quizzes.index', ['quizzes' => $quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $quiz = new Quiz();

        return view('admin.quizzes.edit', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuizRequest $request
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\View\View
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
     * @return \Illuminate\View\View
     */
    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  QuizRequest $request
     * @param  Quiz $quiz
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Http\Response|void
     */
    public function destroy(Quiz $quiz)
    {
        // TODO: Delete quiz
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

        return Response::make('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response|void
     */
    public function deleteQuestion(Quiz $quiz, Question $question)
    {
        // TODO: Delete quiestion from quiz
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response|void
     */
    public function addQuestion(Quiz $quiz, Question $question)
    {
        // TODO: Add question
    }
}
