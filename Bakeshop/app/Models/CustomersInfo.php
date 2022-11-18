<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomersInfo
 * 
 * @property int $customer_ID
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $role
 *
 * @package App\Models
 */
class CustomersInfo extends Model
{
	protected $table = 'customers_info';
	protected $primaryKey = 'customer_ID';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'password',
		'role'
	];
}
