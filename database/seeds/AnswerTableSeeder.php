<?php

use App\Answer;
use App\Question;
use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = array_keys(QuestionTableSeeder::getQuestions());
        $answers = ['A', 'B', 'C'];
        foreach ($questions as $index => $slug) {
            $question = Question::where('slug', 'question-' . $slug)->first();
            $correct = $index % count($answers);
            foreach ($answers as $number => $answerText) {
                $answer = new Answer();
                $answer->question()->associate($question);
                $answer->answer = $answerText;
                $answer->active = true;
                $answer->correct = $number == $correct;
                $answer->save();
            }
        }
    }
}
