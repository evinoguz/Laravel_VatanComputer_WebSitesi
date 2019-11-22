<?php

namespace App\Http\Controllers\Front;

use App\Models\Favorites;
use App\Models\Menus;
use App\Models\ProductImages;
use App\Models\Sepets;
use App\Models\SubMenus;
use App\Models\Products;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
class homeController extends Controller
{
    public function __construct()
    {
        $menus=Menus::all();
        $favorites=Favorites::all();
        $submenus=SubMenus::all();
        $uruns=Products::all();
        $sepets=Sepets::all();
        View::share('sepets',$sepets);
        View::share('favorites',$favorites);
        View::share('submenus',$submenus);
        View::share('uruns',$uruns);
        View::share('menus',$menus);
    }

    public function index(){

        $urunshops=Products::all()->random(3);
        $urunnews=Products::all()->take(10);
        $uruntops=Products::all()->random(6);
        $urunstop1=Products::all()->random(4);
        $urunstop2=Products::all()->random(3);
        $urunstop3=Products::all()->random(4);
        View::share('urunstop1',$urunstop1);
        View::share('urunstop2',$urunstop2);
        View::share('urunstop3',$urunstop3);
        View::share('urunshops',$urunshops);
        View::share('urunnews',$urunnews);
        View::share('uruntops',$uruntops);
        return view('Front.Home.index');
    }
    public  function blank(){

        return view('Front.sayfalar.blank');
    }


    public  function menustore($id)
    {

        $submenus=SubMenus::find($id);
        $uruns=Products::where('menu_id',$id)->get();
        View::share('submenus',$submenus);
        View::share('uruns',$uruns);
        return view('Front.sayfalar.store');
    }
    public  function substore($id)
    {

        $submenus=SubMenus::find($id);
        $uruns=Products::where('submenu_id',$id)->get();
        View::share('submenus',$submenus);
        View::share('uruns',$uruns);
        return view('Front.sayfalar.store');
    }
    public  function profile()
    {
        return view('Front.sayfalar.profile');
    }
    public function product_see($id)
    {
        $urunmores= Products::find($id);
        $uruns=Products::all()->take(6);
        View::share('uruns',$uruns);
        View::share('urunmores',$urunmores);
        return view('Front.sayfalar.product');
    }
    public function sepet()
    {
        return view('Front.sayfalar.sepet');
    }
    public function sepet_post($id){
        $check_sepet=Sepets::where('urun_id',$id)->get();
        if($check_sepet->count()==0)
        {
            $sepets=new Sepets();
            $sepets->user_id=Auth::user()->id;
            $sepets->urun_id=$id;
            $sepets->number=1;
            $sepets->save();
        }
        else
        {
            $sepets=Sepets::find($check_sepet)->first();
            $sepets->user_id=Auth::user()->id;
            $sepets->urun_id=$id;
            $sepets->number+=1;
            $sepets->save();
        }
        return redirect()->route('Front.sepet');
    }
    public function sepet_product_remove($id){

        Sepets::where('id',$id)->delete();
        return redirect()->route('Front.sepet');

    }
}
