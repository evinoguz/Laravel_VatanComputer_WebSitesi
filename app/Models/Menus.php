<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table = 'menu';
    public $timestamps = 'true';
    protected $fillable = [
        'name',
    ];

    public function subMenus()
    {
        return $this->hasMany('App\Models\SubMenus', 'menu_id', 'id');
    }

    public function uruns()
    {
        return $this->hasMany('App\Models\Uruns', 'menu_id', 'id');
    }

}
