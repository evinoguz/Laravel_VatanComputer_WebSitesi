@extends('CMS.main')
@section('content')
    <div class="">
        <div class="page-title">
            <a href="{{route('CMS.urun.list')}}">Product List</a>
            <div class="title_left">
                <h3>Product <small>Add</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <form class="form-horizontal form-label-left" action="{{route('CMS.urun.edit_post',$uruns->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <h2>Kategori Name</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="menu_id" id="menu_id" class="form-control" style="width: 250px">
                                    @foreach($menus as $menu)
                                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <h2>Sub_Kategori Name</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="sub_menu_id" id="sub_menu_id" class="form-control" style="width: 250px">
                                    @foreach($submenus as $submenu)
                                        <option value="{{$submenu->id}}">{{$submenu->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Product Image</h2>
                            <div class="col-sm-12">
                                <input type="file"  name="img_url" class="btn btn-default btn-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <img style="width: 400px; height: 200px;" src="{{\App\Models\Products::find($uruns->id) ->img_url}}" alt="image">
                        </div>


                        <div class="form-group">
                            <label for="product_imgs[]">
                                Product Content Images</label>
                            <div class="col-sm-12">
                                <input type="file" multiple maxlength="5"  name="product_imgs[]" class="btn btn-default btn-sm">
                            </div>
                        </div>

                        <div class="form-group">
                            @foreach(\App\Models\ProductImages::where('product_id',$uruns->id)->get() as $product_image)
                            <img style="width: 100px; height: 80px;" src="{{$product_image->img_url}}" alt="image">

                            @endforeach
                        </div>


                        <div class="form-group">
                            <h2>Product Content</h2>
                            <div class="col-sm-12">
                                <textarea name="contents" id="summernote"  class="summernote" style="width: 250px">
                                    {!! $uruns->content !!}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <h2>Product Price</h2>
                            <div class="col-sm-12">
                                <input name="price" id="price" value="{{$uruns->price}}" style="width: 250px" id="price" placeholder="Lira.kuruş giriniz..."  type="number" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button onclick="return confirm('Yeni Ürün Güncellensin mi?')" type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
