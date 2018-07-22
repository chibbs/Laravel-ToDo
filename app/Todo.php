<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
    protected $fillable = ['todo','due', 'cat_id','user_id', 'done'];

/**
     * Get the author that wrote the book.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
