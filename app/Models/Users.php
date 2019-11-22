<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';
    public $timestamps = 'true';
    public $fillable = [
        'admin',
        'name',
        'email',
        'password',
    ];
    public function uruns(){
        return $this->hasMany(Uruns::class,'user_id','id');
    }
    protected $hidden = [
        'password',
    ];
}
