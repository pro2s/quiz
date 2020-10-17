<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Quiz as QuizContract;
use App\Http\Controllers\Controller;
use App\Question;
use App\Quiz;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;

class QuizController extends Controller
{
    /**
     * @var QuizContract
     */
    private $quizes;

    public function __construct(QuizContract $quizes)
    {
        $this->quizes = $quizes;
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return Quiz::where('active', true)->get();
    }

    public function show($slug): ?Quiz
    {
        $quiz = Quiz::where('slug', $slug)
            ->where('active', true)
            ->with(['questions' => function (Builder $query): Builder {
                return $query->where('active', true)->with('answers:id,question_id,answer');
            }])
            ->first();

        if ($quiz) {
            $quiz->makeHidden('questions');
        } else {
            abort(404);
        }
        // TODO: get current question for user

        return $quiz;
    }

    /**
     * @return (Question|bool|null)[]
     *
     * @psalm-return array{question: Question|null, finished: bool}
     */
    public function next($quizSlug, $questionSlug): array
    {
        $nextQuestion = $this->quizes->getNextQuestionBySlugs($quizSlug, $questionSlug);

        return ['question' => $nextQuestion, 'finished' => $nextQuestion === null];
    }
}
