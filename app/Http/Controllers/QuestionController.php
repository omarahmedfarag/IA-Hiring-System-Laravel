<?php

namespace App\Http\Controllers;
use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Quiz;
use App\Question;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Quiz $quiz)
    {
        return QuestionResource::collection($quiz->questions);
       // return QuestionResource::collection($quiz->questions()->get());

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
    public function store(Quiz $quiz,QuestionRequest $request)
    {
        // $question = new Question;
        // $question->body = $request->body;
        // $question->quiz_id = $quiz->id;
        // $question->save();
        $question = new Question($request->all());
        $quiz->questions()->save($question);
       // return $question->id;
        return response([
            "data" =>new QuestionResource($question)
    ],Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz,Question $question)
    {
        return new QuestionResource($quiz->questions()->find($question->id));
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
    public function destroy(Quiz $quiz,Question $question)
    {
        $question->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

  
}
