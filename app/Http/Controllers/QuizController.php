<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuizRequest;
use App\Http\Resources\QuizResource;
use App\Quiz;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QuizResource::collection( Quiz::all());
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
    public function store(QuizRequest $request)
    {
        $quiz = new Quiz;
        $quiz->name = $request->name;
        $quiz->type = $request->type;
        $quiz->save();
       // return $quiz->id;
        return response([
            "data" =>new QuizResource($quiz)
    ],Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return new QuizResource( $quiz );
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
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return response(null,Response::HTTP_NO_CONTENT);

    }
    public function fullQuiz(Request $request){
        $quiz = DB::table('quizzes')->where('type', $request->type)->inRandomOrder()->first();
        return response()->json($quiz);


    }
}
