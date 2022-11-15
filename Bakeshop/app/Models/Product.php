<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $product_ID
 * @property string $product_name
 * @property string $price
 * @property int $stock
 * @property string $photo
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'product_ID';
	public $timestamps = false;

	protected $casts = [
		'stock' => 'int'
	];

	protected $fillable = [
		'product_name',
		'price',
		'stock',
		'photo'
	];
}
