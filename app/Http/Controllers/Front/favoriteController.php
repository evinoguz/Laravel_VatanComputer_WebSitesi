<?php

namespace App\Http\Controllers\Front;

use App\Models\Favorites;
use App\Models\Menus;
use App\Models\Products;
use App\Models\SubMenus;
use App\Models\Sepets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class favoriteController extends Controller
{
    public function favorite()
    {
        $favorites=Favorites::all();
        $submenus=SubMenus::all();
        $uruns=Products::all();
        $menus=Menus::all();
        $sepets=Sepets::all();
        View::share('sepets',$sepets);
        View::share('favorites',$favorites);
        View::share('menus',$menus);
        View::share('submenus',$submenus);
        View::share('uruns',$uruns);
        return view('Front.sayfalar.favorite');
    }
    public  function favorite_post($id)
    {
        $check_favorite = Favorites::where('urun_id', $id)->get();
        if($check_favorite->count() == 0){
            $favorites=new Favorites();
            $favorites->urun_id=$id;
            $favorites->user_id=Auth::user()->id;
            $favorites->save();
        }
        return redirect()->route('Front.favorite');

    }
    public function favorite_remove($id){
        Favorites::where('id',$id)->delete();
        return redirect()->route('Front.favorite');
    }
}
