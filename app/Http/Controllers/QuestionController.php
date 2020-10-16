<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use App\Http\Requests\QuestionRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::paginate(15);
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question();
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\QuestionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $request->flash();
        $data = $request->validated();
        $question = new Question();
        $question->fill($data);
        $question->save();
        return redirect()->route('questions.show', [$question]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\QuestionRequest $request
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $data = $request->validated();
        $question->update($data);
        return redirect()->route('questions.edit', [$question]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function toggle(Question $question)
    {
        $question->active = !$question->active;
        $question->save();
        return Response::make('', "200");
    }

     /**
     * Search a listing of the resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request  $request)
    {
        $text = $request->get('text', false);
        if ($text) {
            return Question::where('active', true)->where('title', 'like', '%'. $text.'%')->get();
        } else {
            return Question::where('active', true)->get();
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function correct(Question $question, Answer $answer)
    {
        $answer->correct = !$answer->correct;
        $answer->save();
        return redirect()->route('questions.edit', [$question]);
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question $question
     * @param  \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function editAnswer(Question $question, Answer $answer)
    {
        return view('admin.questions.edit_answer', compact(['question','answer']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function createAnswer(Question $question)
    {
        $answer = new Answer();
        $answer->question = $question;
        return view('admin.questions.edit_answer', compact(['question','answer']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question $question
     * @param  \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function updateAnswer(Request $request, Question $question, Answer $answer)
    {
        return redirect()->route('questions.answer.edit', [$question, $answer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function storeAnswer(Request $request, Question $question)
    {
        return redirect()->route('questions.edit', [$question]);
    }
}
