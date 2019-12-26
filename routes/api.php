<?php
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user/{id}',function($id)
{
    return User::findOrFail($id);
});

Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');

Route::post('/useranswers','UserAnswerController@store');
Route::get('/useranswers/{id}','UserAnswerController@show');

Route::apiResource('/quizzes','QuizController');

Route::post('/score','ScoreController@store');
Route::group(['prefix' => 'quizzes'],function(){
    Route::apiResource('/{quiz}/questions','QuestionController');
} );

Route::get('/fullquiz/{type}','QuizController@fullQuiz');


Route::group(['prefix' => 'quizzes/{quiz}/questions/{question}'],function(){

    Route::apiResource('/answers','AnswerController');
} );