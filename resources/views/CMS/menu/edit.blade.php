@extends('CMS.main')
@section('content')

    <div class="">
        <div class="page-title">
            <a href="{{route('CMS.menu.list')}}">Kategori List</a>
            <div class="title_left">
                <h3>Kategori <small>Edit</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="{{route('CMS.menu.edit_post',$menus->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <h2>Kategori Name</h2>
                                <div class="col-sm-12">
                                    <input id="name" name="name" style="width: 180px"  type="text" value="{{$menus->name}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button onclick="return confirm('Kategori Güncellensin mi?')" type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
