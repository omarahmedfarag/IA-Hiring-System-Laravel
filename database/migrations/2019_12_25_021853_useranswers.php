<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Useranswers extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useranswers', function (Blueprint $table) {
            $table->Increments('id')->unique();
            $table->boolean('condition');

            $table->integer('user_id')->unsigned()->index();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

            $table->integer('answer_id')->unsigned()->index();
           $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
        });
    }



    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('useranswers');

    }
}