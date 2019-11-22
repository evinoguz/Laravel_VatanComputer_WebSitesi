<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
// yukardaki kodu sil. Bunu yaz
//use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin','name', 'email', 'password', //create ile kullanılacak alanları
    ];
    // Tüm alanların doldurulmasına izin vermek için
    // protected $guarded=[]; //dizi olarak tanımlanır. Yukardaki fillable fonksiyonu silinir.

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', //veri çekme sonrasında kullanıcıların görmek istemediğimiz alanları gizlemek için
    ];
}
