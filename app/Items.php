<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table ="items";
    protected $fillable = ["product_code","product_name","category","quantity","selling_price"];
}