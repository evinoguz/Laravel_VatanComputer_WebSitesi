<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table='product_images';
    public $timestamps='true';
    protected $fillable=[
       'img_url'
    ];
}
