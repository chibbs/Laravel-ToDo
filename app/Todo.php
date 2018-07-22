<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Todo extends Model
{
    use Sortable;
    protected $table = 'todos';
    protected $fillable = ['todo','due', 'category_id', 'user_id', 'done'];
    public $sortable = ['todo', 'due'];

/**
     * Get the category of that todo.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
