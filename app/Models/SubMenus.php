<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenus extends Model
{
    protected $table='sub_menu';
    public $timestamps='true';
    protected $fillable=[
        'menu_id',
        'name',
    ];
    public function menus(){
        return $this->belongsTo(Menus::class,'id','menu_id');
    }
    public function uruns(){
        return $this->hasMany('App\Models\Uruns','sub_menu_id','id');
    }

}
