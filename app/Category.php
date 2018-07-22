<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category'];

    /*
    * Get Todo with Category
    *
    */
    public function todo()
    {
        return $this->hasMany('App\Todo');
    }
}
