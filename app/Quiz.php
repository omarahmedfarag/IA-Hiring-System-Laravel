<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
class Quiz extends Model
{
    protected $fillable = [
        'name','type'
    ];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
