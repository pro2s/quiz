<?php

use App\Quiz;
use App\Question;
use Illuminate\Database\Seeder;

class QuizQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizzes =Quiz::where('active', true)
            ->take(3)
            ->get();

        $questions = Question::where('active', true)
            ->take(10)
            ->get();

        foreach ($quizzes as $quiz) {
            $quizQuestions = $questions->random(5);
            $quiz->questions()->saveMany($quizQuestions);
            /*
            foreach ($quizQuestions as $question) {
                $quiz->questions()->attach($question);
            }
            */
        }
    }
}
