<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebookstore extends Model
{
	public $timestamps = false;
    protected $guarded=[];

    protected $table = 'e_bookstore';

    protected $fillable = ['book_name', 'book_author'];	
	
}

