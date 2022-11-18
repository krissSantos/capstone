<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductsPhoto
 * 
 * @property int $product_ID
 * @property string|null $image
 *
 * @package App\Models
 */
class ProductsPhoto extends Model
{
	protected $table = 'products_photos';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'product_ID' => 'int'
	];

	protected $fillable = [
		'product_ID',
		'image'
	];
}
