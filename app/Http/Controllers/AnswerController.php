<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use App\Http\Resources\AnswerResource;
use App\Answer;
use App\Question;
use App\Quiz;
use Symfony\Component\HttpFoundation\Response;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Quiz $quiz,Question $question)
    {
      //  return AnswerResource::collection($question->answers);
        return AnswerResource::collection($question->answers()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Quiz $quiz,Question $question,AnswerRequest $request)
    {
        $answer = new Answer($request->all());
        $question->answers()->save($answer);
        return response([
            "data" =>new AnswerResource($answer)
    ],Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz,Question $question,Answer $answer)
    {
        return new AnswerResource($question->answers()->find($answer->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz,Question $question,Answer $answer)
    {
        $answer->delete();
        return response(null,Response::HTTP_NO_CONTENT);

    }
}
