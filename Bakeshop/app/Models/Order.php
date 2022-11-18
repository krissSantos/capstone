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
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $mobile_number
 * @property string $email_address
 * @property string $cardholder_name
 * @property int $credit_card_number
 * @property Carbon $time_placed
 * @property string $status
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'order_ID';
	public $timestamps = false;

	protected $casts = [
		'credit_card_number' => 'int'
	];

	protected $dates = [
		'time_placed'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'address',
		'mobile_number',
		'email_address',
		'cardholder_name',
		'credit_card_number',
		'time_placed',
		'status'
	];
}
