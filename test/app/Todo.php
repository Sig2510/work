<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['desc', 'user_id', 'todolist_id'];

    public static function dones()
    {
      return Todo::where('status', true)->get();
    }

    public function status()
    {
      return $this->status ? 'Done' : 'Undone';
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function todolist()
    {
      return $this->belongsTo('App\Todolist');
    }
}
