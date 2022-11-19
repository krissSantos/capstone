<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProduct
 * 
 * @property int $op_ID
 * @property int $order_ID
 * @property int $product_ID
 * @property int $quantity
 * @property int $price
 *
 * @package App\Models
 */
class OrderProduct extends Model
{
	protected $table = 'order_products';
	protected $primaryKey = 'op_ID';
	public $timestamps = false;

	protected $casts = [
		'order_ID' => 'int',
		'product_ID' => 'int',
		'quantity' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'order_ID',
		'product_ID',
		'quantity',
		'price'
	];
}
