<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use Sortable;
    protected $table = 'categories';
    protected $fillable = ['category', 'user_id'];
    public $sortable = ['category'];

    /*
    * Get Todo with Category
    *
    */
    public function todo()
    {
        return $this->hasMany('App\Todo');
    }
}
