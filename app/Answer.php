<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
class Answer extends Model
{
    protected $fillable = [
        'body','condition'
    ];

    public function Question()
    {
        return $this->belongsTo(Question::class);
    }

}
