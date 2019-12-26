<?php

namespace App\Http\Controllers;

use App\UserAnswer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class UserAnswerController extends Controller
{
    public function store(Request $request)
    {
        $userAnswer = new UserAnswer($request->all());


        $userAnswer->save();
        return response([
            "UserAnswer" => $userAnswer
    ],Response::HTTP_CREATED);

    }

    public function show( $id)
    {
         $userAnswers = DB::table('useranswers')->where('user_id',$id)->get();
        return response()->json($userAnswers);
    }


}