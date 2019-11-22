<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Sepets extends Model
{
    protected $table='sepet';
    public $timestamps='true';
    protected $fillable=[
        'user_id',
        'urun_id',
        'number',
    ];
    public function uruns(){
        return $this->belongsTo(Uruns::class,'id','urun_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'id','user_id');
    }

}
