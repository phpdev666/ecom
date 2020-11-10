<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'product';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
        'modelno', 'cat_id', 'productname', 'shot_description','description','image','price','discount','discount_price','sell_price','status'
   		 ];
}
