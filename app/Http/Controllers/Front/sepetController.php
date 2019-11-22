<?php

namespace App\Http\Controllers\Front;

use App\Models\Favorites;
use App\Models\Menus;
use App\Models\Products;
use App\Models\Sepets;
use App\Models\SubMenus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class sepetController extends Controller
{
    public function __construct()
    {
        $uruns = Products::all()->take(6);
        $menus = Menus::all();
        $favorites = Favorites::all();
        $sepets = Sepets::all();
        $submenus = SubMenus::all();
        View::share('submenus', $submenus);
        View::share('sepets', $sepets);
        View::share('favorites', $favorites);
        View::share('uruns', $uruns);
        View::share('menus', $menus);
    }

    public function product_see($id)
    {
        $urunmores = Products::find($id);
        View::share('urunmores', $urunmores);
        return view('Front.sayfalar.product');
    }

    public function sepet()
    {
        return view('Front.sayfalar.sepet');
    }

    public function sepet_post($id)
    {
        $check_sepet = Sepets::where('urun_id', $id)->get();
        if ($check_sepet->count() == 0) {
            $sepets = new Sepets();
            $sepets->user_id = Auth::user()->id;
            $sepets->urun_id = $id;
            $sepets->number = 1;
            $sepets->save();
        } else {
            $sepets = Sepets::find($check_sepet)->first();
            $sepets->user_id = Auth::user()->id;
            $sepets->urun_id = $id;
            $sepets->number += 1;
            $sepets->save();
        }
        return redirect()->route('Front.sepet');
    }

    public function sepet_product_remove($id)
    {

        Sepets::where('id', $id)->delete();
        return redirect()->route('Front.sepet');

    }
    public function remove(){

    }
}
