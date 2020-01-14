<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected  $primaryKey = 'book_id';
    public $timestamps = false;
    protected $guarded = [];
}
