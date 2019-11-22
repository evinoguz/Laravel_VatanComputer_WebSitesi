<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='product';
    public $timestamps='true';
    protected $fillable=[
        'menu_id',
        'submenu_id',
        'img_url',
        'content',
        'price',
    ];
    public function product_images()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }
    public function menus()
    {
        return $this->belongsTo(Menus::class, 'id','menu_id');
    }
    public function sub_menus()
    {
        return $this->belongsTo(SubMenus::class,'id','sub_menu_id');
    }

}
