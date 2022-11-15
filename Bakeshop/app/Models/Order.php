<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $order_ID
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property int $mobile_number
 * @property string $email_address
 * @property int $cardholder_name
 * @property int $credit_card_number
 * @property string|null $products
 * @property int|null $quantity
 * @property int|null $total
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'order_ID';
	public $timestamps = false;

	protected $casts = [
		'mobile_number' => 'int',
		'cardholder_name' => 'int',
		'credit_card_number' => 'int',
		'quantity' => 'int',
		'total' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'address',
		'mobile_number',
		'email_address',
		'cardholder_name',
		'credit_card_number',
		'products',
		'quantity',
		'total'
	];
}
