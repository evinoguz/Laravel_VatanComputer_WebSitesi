<?php

namespace App\Http\Controllers\Front;

use App\Models\Favorites;
use App\Models\Menus;
use App\Models\Products;
use App\Models\SubMenus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class paymentController extends Controller
{
    public function payment(){

        $uruns=Products::all();
        $menus=Menus::all();
        $favorites=Favorites::all();
        View::share('favorites',$favorites);
        View::share('menus',$menus);
        View::share('uruns',$uruns);
        return view('Front.sayfalar.payment');
    }
    public  function checkout(){
        $favorites=Favorites::all();
        View::share('favorites',$favorites);
        $menus=Menus::all();
        $submenus=SubMenus::all();
        $uruns=Products::all();
        View::share('menus',$menus);
        View::share('submenus',$submenus);
        View::share('uruns',$uruns);
        return view('Front.sayfalar.checkout');
    }
}
