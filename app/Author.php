<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;
class Author extends Model
{
    //
    protected $fillable = ['name'];
    public function books ()
    {
    	return $this->hasMany('App\Book');
    }
    
}
