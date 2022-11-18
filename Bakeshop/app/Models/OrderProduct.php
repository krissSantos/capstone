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
 *
 * @package App\Models
 */
class OrderProduct extends Model
{
	protected $table = 'order_products';
	protected $primaryKey = 'op_ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'op_ID' => 'int',
		'order_ID' => 'int',
		'product_ID' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'order_ID',
		'product_ID',
		'quantity'
	];
}
