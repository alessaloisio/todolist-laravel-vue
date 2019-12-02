<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListTask extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lists';

    public function tasks()
    {
      return $this->hasMany('App\Task', 'id');
    }

}
