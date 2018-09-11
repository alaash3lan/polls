<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;

class Question extends Model
{
protected $guarded = [];
public function poll(){

return $this->belongsToMany(Poll::class, 'poll_id');
    }


    public function answer(){

    return $this->hasOne('App\Answer');
        }

}
