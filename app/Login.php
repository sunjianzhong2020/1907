<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected  $table = "admin";
    protected  $primaryKey = 'user_id';
    public $timestamps = false;
    protected $guarded = [];
}
