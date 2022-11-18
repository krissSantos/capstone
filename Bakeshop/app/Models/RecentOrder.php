<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RecentOrder
 * 
 * @property int $product_ID
 * @property int|null $quantity
 *
 * @package App\Models
 */
class RecentOrder extends Model
{
	protected $table = 'recent_orders';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'product_ID' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'product_ID',
		'quantity'
	];
}
