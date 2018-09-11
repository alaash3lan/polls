<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
  protected $guarded = [];

  public function question(){

  return $this->hasMany('App\Question');
      }
}
