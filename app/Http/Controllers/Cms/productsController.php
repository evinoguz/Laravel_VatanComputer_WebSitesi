<?php

namespace App\Http\Controllers\Cms;

use App\Models\Favorites;
use App\Models\Menus;
use App\Models\ProductImages;
use App\Models\SubMenus;
use App\Models\Products;
use App\Models\Sepets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use PHPUnit\Util\RegularExpression;


class productsController extends Controller
{
    public function index(){
        $menus=Menus::all();
        View::share('menus',$menus);
        $submenus=SubMenus::all();
        View::share('submenus',$submenus);
        $uruns=Products::all();
        View::share('uruns',$uruns);

        return view('CMS.urun.list');
    }
    public function ajax_menu(){
        $menus=Menus::all();
        return $menus;
    }
    public function ajax_submenu($id){
        $menus=Menus::all();
        $submenus=SubMenus::where('menu_id',$id)->get();
        return $submenus;
    }
    public function create(){
        $menus=Menus::all();
        $submenus=SubMenus::all();
        View::share('menus',$menus);
        View::share('submenus',$submenus);
        return view('CMS.urun.create');
    }


    public function create_post(Request $request){
        $urun=new Products();
        $urun->menu_id=$request->menu_id;
        $urun->submenu_id=$request->sub_menu_id;
        if($request->has('img_url')){
            $file=$request->img_url;
            $file->move(public_path().'/img/uruns/',$file->getClientOriginalName());
            $urun->img_url='/img/uruns/'.$file->getClientOriginalName();

        }
        $urun->content=$request->contents;
        $urun->price=$request->price;
        $urun->save();
        if ($request->hasFile('product_imgs')) {

            foreach ($request->product_imgs as $key => $product_img){
                $detail = new ProductImages();
                $detail->product_id = $urun->id;
                $file = $product_img;
                $name = time() .($key+1).'.'.$file->getClientOriginalExtension();
                $file->move(public_path() . '/img/uruns/product_images/', $file->getClientOriginalName());
                $adres = '/img/uruns/product_images/' . $file->getClientOriginalName();
                $detail->img_url = $adres;
                $detail->saveOrFail();
            }
        }

        return redirect()->route('CMS.urun.create');


    }
    public function edit($id){
        $menus=Menus::all();
        View::share('menus',$menus);
        $submenus=SubMenus::all();
        View::share('submenus',$submenus);
        $product_images=ProductImages::all();
        View::share('product_images',$product_images);
        $uruns=Products::find($id);
        View::share('uruns',$uruns);

        return view('CMS.urun.edit');
    }
    public function edit_post($id, Request $request){
        $urun=Products::find($id);
        $uruncontents=ProductImages::where('product_id',$urun->id)->get();
        View::share('uruncontents',$uruncontents);
        View::share('urun',$urun);
        $urun->menu_id=$request->menu_id;
        $urun->submenu_id=$request->sub_menu_id;

        if($request->has('img_url')){
            if(file_exists(public_path().$urun->img_url)){
                unlink(public_path().$urun->img_url);
            }
            $urun->delete();
            $file=$request->img_url;
            $file->move(public_path().'/img/uruns/',$file->getClientOriginalName());
            $urun->img_url='/img/uruns/'.$file->getClientOriginalName();
        }
        $urun->content=$request->contents;
        $urun->price=$request->price;
        $urun->save();
        $prouct_images = ProductImages::where('product_id',$urun->id)->get();

        if ($request->hasFile('product_imgs')) {
            foreach ($prouct_images as $prouct_image)
            {
                if(file_exists(public_path().$prouct_image->img_url)){
                    unlink(public_path().$prouct_image->img_url);
                }
                ProductImages::where('product_id',$urun->id)->delete();
            }
            foreach ($request->product_imgs as $key => $product_img){
                $detail = new ProductImages();
                $detail->product_id = $urun->id;
                $file = $product_img;
                $name = time() .($key+1).'.'.$file->getClientOriginalExtension();
                $file->move(public_path() . '/img/uruns/product_images/', $file->getClientOriginalName());
                $adres = '/img/uruns/product_images/' . $file->getClientOriginalName();
                $detail->img_url = $adres;
                $detail->saveOrFail();
            }
        }
        return redirect()->route('CMS.urun.list');
    }


    public function remove($id){
        $urun=Products::find($id);
        Favorites::where('urun_id',$id)->delete();
        if (file_exists(public_path() . $urun->img_url)) {
            unlink(public_path() . $urun->img_url);
        } $urun->delete();
        $prouct_images = ProductImages::where('product_id',$urun->id)->get();
        foreach ($prouct_images as $prouct_image)
        {
            if(file_exists(public_path().$prouct_image->img_url)){
                unlink(public_path().$prouct_image->img_url);
            }
            ProductImages::where('product_id',$urun->id)->delete();
        }
        return redirect()->route('CMS.urun.list');
    }

}
