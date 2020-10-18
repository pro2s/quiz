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

    /**
     * @param string $slug
     */
    public function show($slug): ?Quiz
    {
        return $this->quizes->getQuizBySlug($slug)->makeHidden('questions');
    }

    /**
     * @param string $quizSlug
     * @param string $questionSlug
     *
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
