<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = [
        'condition','user_id','question_id','answer_id'
    ];

    protected $table = 'useranswers';
}