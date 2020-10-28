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

        /** @var string|null $text */
        $text = $request->get('text', null);
        if ($text) {
            $activeQuestions->where('title', 'like', '%' . $text . '%');
        }

        return $activeQuestions->get();
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
