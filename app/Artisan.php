<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    protected $table = 'artisan';
    protected  $primaryKey = 'a_id';
    public $timestamps = false;
    protected $guarded = [];
}
