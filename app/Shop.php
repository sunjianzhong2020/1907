<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = "shop";
    protected $primaryKey = 'shop_id';
    public $timestamps = false;
    protected $guarded = [];
}
