<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AnswerController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function toggle(Answer $answer)
    {
        $answer->active = !$answer->active;
        $answer->save();
        return Response::make('', "200");
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }

}