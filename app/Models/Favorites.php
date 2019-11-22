<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorite';
    public $timestamps = 'true';
    protected $fillable = [
        'user_id',
        'urun_id',
    ];
    public function uruns()
    {
        return $this->belongsTo(Menus::class, 'id','urun_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'id','user_id');
    }

}
