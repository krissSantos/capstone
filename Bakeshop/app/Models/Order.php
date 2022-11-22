<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $order_ID
 * @property Carbon $time_placed
 * @property string $status
 * @property int $customer_ID
 * @property string $full_name
 * @property string $address
 * @property string $mobile_number
 * @property string $email
 * @property string $cardholder_name
 * @property string $cardholder_number
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'order_ID';
	public $timestamps = false;

	protected $casts = [
		'customer_ID' => 'int'
	];

	protected $dates = [
		'time_placed'
	];

	protected $fillable = [
		'time_placed',
		'status',
		'customer_ID',
		'full_name',
		'address',
		'mobile_number',
		'email',
		'cardholder_name',
		'cardholder_number'
	];
}
