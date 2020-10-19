<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "order";
    public $timestamps = true;

    protected $fillable = [
      'product_id','product_name','product_brand','product_price','product_quantity'
	  ];
}