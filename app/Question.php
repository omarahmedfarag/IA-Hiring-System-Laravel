<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quiz;
class Question extends Model
{
    protected $fillable = [
        'body'
    ];

    public function Quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
