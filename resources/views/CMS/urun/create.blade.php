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
                    <form class="form-horizontal form-label-left" action="{{route('CMS.urun.create_post')}}" method="post" enctype="multipart/form-data">
                       <!--laravel içerisinde bir formun post edilebilmesi için bu alan eklenir -->
                        {{csrf_field()}}

                        <div class="form-group">
                            <h2>Kategori Name</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="menu_id" id="menu_id" class="form-control" style="width: 250px">
                                        <option >Kategori Seçiniz...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" >
                            <h2>Sub_Kategori Name</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="sub_menu_id" id="sub_menu_id"  class="form-control" style="width: 250px">
                                    <option >Sub_Kategori Seçiniz...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <h2>Product Image</h2>
                            <div class="col-sm-12">
                                <input style="width: 250px" type="file"  name="img_url" class="btn btn-default btn-sm" title="Upload New Image">
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Product Images</h2>
                            <div class="col-sm-12">
                                <label for="product_imgs[]">
                                    Product Content Images</label>
                                <input style="width: 250px" multiple maxlength="5" type="file" name="product_imgs[]" class="form-control"
                                       title="Product Image">
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Product Content</h2>
                            <div class="col-sm-12">
                                <textarea name="contents" id="summernote" class="summernote" style="width: 250px"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <h2>Product Price</h2>
                            <div class="col-sm-12">
                                <input name="price" id="price" style="width: 250px" id="price"  type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button onclick="return confirm('Yeni Ürün eklensin mi?')" type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
<script>
    $(document).ready(function(){
        $.ajax({
            type:'get',
            url:'{{route('CMS.urun.ajax_menu')}}',
            success:function (result) {
                $(result).each(function(index){
                    $('#menu_id').append('<option value="'+result[index]['id']+'">'+ result[index]['name']+'</option>');
                });
            }
        });


        $('#menu_id').on('change', function(){
            $('#sub_menu_id').empty();
        $.ajax({
            type:'get',
            url:'/panel/urun/ajax_submenu/' +$(this).val(),
            data:$(this).val(),
            success:function (submenus) {
                $(submenus).each(function(index){
                    $('#sub_menu_id').append('<option value="'+submenus[index]['id']+'">'+ submenus[index]['name']+'</option>');
                });
            }
        })
        });
    });




</script>
@endsection













