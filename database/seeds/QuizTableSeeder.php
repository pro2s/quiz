<?php

use App\Quiz;
use Illuminate\Database\Seeder;

class QuizTableSeeder extends Seeder
{
    public const RANDOM_IMAGE = 'https://picsum.photos/600/300/?random';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz = new Quiz();
        $quiz->slug = 'test-one';
        $quiz->name = 'Integer facilisis dolor eu facilisis pharetra.';
        $quiz->image = self::RANDOM_IMAGE;
        $quiz->description = 'Nulla a lacus vestibulum, molestie tortor ut, mattis odio.
        Vestibulum vel felis a nulla aliquet imperdiet et in erat.
        Proin iaculis tellus accumsan odio placerat luctus.';
        $quiz->active = true;
        $quiz->save();

        $quiz = new Quiz();
        $quiz->slug = 'test-two';
        $quiz->name = 'Curabitur sit amet urna nec nisl aliquam accumsan.';
        $quiz->image = self::RANDOM_IMAGE;
        $quiz->description = 'Aliquam molestie lacus id ipsum scelerisque varius.
        Duis ultricies dolor nec augue rhoncus accumsan.
        Aenean pellentesque quam a tortor aliquam consectetur.';
        $quiz->active = true;
        $quiz->save();

        $quiz = new Quiz();
        $quiz->slug = 'test-three';
        $quiz->name = 'Etiam sodales ipsum vitae dapibus suscipit.';
        $quiz->image = self::RANDOM_IMAGE;
        $quiz->description = 'Etiam lacinia diam ut nisl pellentesque, in congue massa volutpat.
        Mauris a nulla condimentum, egestas libero molestie, aliquet magna.
        Praesent non ipsum a lorem sodales euismod sagittis ut eros.';
        $quiz->active = true;
        $quiz->save();
    }
}
