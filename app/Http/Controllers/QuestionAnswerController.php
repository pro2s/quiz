<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class QuestionAnswerController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @param Answer $answer
     * @return \Illuminate\View\View
     */
    public function edit(Question $question, Answer $answer)
    {
        return view('admin.questions.edit_answer', compact(['question', 'answer']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Question $question
     * @return \Illuminate\View\View
     */
    public function create(Question $question)
    {
        $answer = new Answer();
        $answer->question()->associate($question);

        return view('admin.questions.edit_answer', compact(['question', 'answer']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param Question $question
     * @param Answer $answer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        return redirect()->route('questions.answer.edit', [$question, $answer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Question $question)
    {
        return redirect()->route('questions.edit', [$question]);
    }
}
