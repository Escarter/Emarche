<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $fillable = [
	 'order_number',
	'product_id',
	'product_id',
	'email',
	'billing_name',
	'billing_address',
	'billing_city',
	'billing_state',
	'billing_zip',
	'billing_country',
	'shipping_name',
	'shipping_address',
	'shipping_city',
	'shipping_state',
	'shipping_zip',
	'shipping_country',
	'onetimeurl',
	];
    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
