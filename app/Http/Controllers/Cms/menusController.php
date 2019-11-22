<?php

namespace App\Http\Controllers\Cms;

use App\Models\Menus;
use App\Models\SubMenus;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;


class menusController extends Controller
{
    public function index(){
        $menus=Menus::all();
        View::share('menus',$menus);
        return view('CMS.menu.list');
    }


    public function create(){

        return view('CMS.menu.create');
    }

    public function create_post(Request $request){
        $menus=new Menus();
        $menus->name=$request->name;
        $menus->save();
        return redirect()->route('CMS.menu.create');
        // return response()->json([
        //            'result' => 'Ok',
        //            'message' => 'Menu olusturuldu',
        //            'menu' => $menus
        //        ]);
    }
    public function createsub(){
        $menus=Menus::all();
        View::share('menus',$menus);
        return view('CMS.menu.createsub');
    }
    public function createsub_post(Request $request){

        $submenus=new SubMenus();
        $submenus->menu_id=$request->menu_id;
        $submenus->name=$request->subname;
        $submenus->save();
        return redirect()->route('CMS.menu.createsub');
    }
    public function edit($id){
        $menus=Menus::find($id);
        View::share('menus',$menus);
        return view('CMS.menu.edit');
    }
    public function edit_post($id, Request $request){
        $menus=Menus::find($id);
        $menus->name=$request->name;
        $menus->save();
        return redirect()->route('CMS.menu.edit');
    }
    public function editsub($id){
        $menus=Menus::all();
        $submenus=SubMenus::find($id);
        View::share('menus',$menus);
        View::share('submenus',$submenus);
        return view('CMS.menu.editsub');
    }
    public  function editsub_post($id, Request $request){
        $submenus=SubMenus::find($id);
        $submenus->menu_id=$request->menu_id;
        $submenus->name=$request->subname;
        $submenus->save();
        return redirect()->route('CMS.menu.editsub');
    }
    public function remove($id)
    {
       Menus::find($id)->delete();
       SubMenus::where('menu_id',$id)->delete();
       return redirect()->route('CMS.menu.list');

    }
    public function removesub($id)
    {
        SubMenus::find($id)->delete();
        return redirect()->route('CMS.menu.list');
    }

}
