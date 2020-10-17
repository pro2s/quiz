<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    public static function getQuestions()
    {
        return [
            'one' => 'Ut et lorem eget libero gravida elementum ?',
            'two' => 'Quisque semper est sed magna cursus blandit ?',
            'three' => 'Phasellus commodo ex in pharetra efficitur ?',
            'four' => 'Donec et dolor ut est varius auctor eget in sapien ?',
            'five' => 'Proin sit amet ante nec dui placerat maximus eu a ipsum ?',
            'six' => 'Donec tempor risus in tellus aliquam, et sollicitudin enim convallis ?',
            'seven' => 'Donec ut diam at felis dictum mattis ?',
            'eight' => 'Donec ac velit aliquet, consectetur eros a, ornare augue ?',
            'nine' => 'Vivamus varius diam sit amet urna rutrum porta ?',
            'ten' => 'Aliquam ac dolor a lacus venenatis condimentum a eget arcu ?',
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::getQuestions() as $key => $title) {
            $question = new Question();
            $question->slug = 'question-' . $key;
            $question->title = $title;
            $question->description = '';
            $question->image = '';
            $question->active = true;
            $question->save();
        }
    }
}
