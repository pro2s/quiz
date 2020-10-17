<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\QuestionRequest;
use App\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $questions = Question::paginate(15);

        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $question = new Question();

        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     * @return \Illuminate\Http\RedirectResponse
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
     * @param Question  $question
     * @return \Illuminate\View\View
     */
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return \Illuminate\View\View
     */
    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestionRequest $request
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $data = $request->validated();
        $question->update($data);

        return $this->redirectToEdit($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response|void
     */
    public function destroy(Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function toggle(Question $question)
    {
        $question->active = !$question->active;
        $question->save();

        return Response::make('');
    }

    /**
     * Search a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return Collection
     */
    public function search(Request $request)
    {
        $activeQuestions = Question::where('active', true);

        $text = $request->get('text', false);
        if ($text) {
            $activeQuestions->where('title', 'like', '%' . $text . '%');
        }

        return $activeQuestions->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question  $question
     * @param Answer  $answer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function correct(Question $question, Answer $answer)
    {
        $answer->correct = !$answer->correct;
        $answer->save();

        return $this->redirectToEdit($question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @param Answer $answer
     * @return \Illuminate\View\View
     */
    public function editAnswer(Question $question, Answer $answer)
    {
        return view('admin.questions.edit_answer', compact(['question', 'answer']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Question $question
     * @return \Illuminate\View\View
     */
    public function createAnswer(Question $question)
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
    public function updateAnswer(Request $request, Question $question, Answer $answer)
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
    public function storeAnswer(Request $request, Question $question)
    {
        return $this->redirectToEdit($question);
    }

    /**
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToEdit(Question $question)
    {
        return redirect()->route('questions.edit', [$question]);
    }
}
