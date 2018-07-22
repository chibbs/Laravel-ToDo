<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
    protected $fillable = ['todo','due', 'category_id','user_id', 'done'];

/**
     * Get the category of that todo.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
