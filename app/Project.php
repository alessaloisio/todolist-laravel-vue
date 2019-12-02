<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function listtasks()
    {
      return $this->hasMany('App\ListTask');
    }
}
