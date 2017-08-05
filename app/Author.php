<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;
use App\Book;
use Illuminate\Support\Facades\Session;
class Author extends Model
{
    //
    protected $fillable = ['id','name'];
    public function books ()
    {
    	return $this->hasMany('App\Book');
    }
    public static function boot()
    {
    	parent::boot();

    	self::deleting(function($authors) {
    		if ($authors->books->count() > 0) {
    			$html = 'Penulis tidak bisa dihapus karena masih memiliki buku :';
    			$html .= '<ul>';
    			foreach ($authors->books as $book) {
    				$html .= "<li>$book->title</li>";
    			}
    			$html .= '</ul>';

    			Session::flash("flash_notification", [
    				"level"=>"danger", 
    				"message"=>$html 
    				]);

    			return false;
    		}
    	});
    }
}
