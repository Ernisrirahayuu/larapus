<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;
use App\Book;
class Book extends Model
{
    //
    protected $fillable = ['title','author_id','amount'];
    public function author ()
    {
    	return $this->belongsTo('App\Author');
    }
}
