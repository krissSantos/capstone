<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomersFeedback
 * 
 * @property string $full_name
 * @property string $email
 * @property string $subject
 * @property string $message
 *
 * @package App\Models
 */
class CustomersFeedback extends Model
{
	protected $table = 'customers_feedback';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'full_name',
		'email',
		'subject',
		'message'
	];
}
