@extends('CMS.main')
@section('content')

    <div class="">
        <div class="page-title">
            <a href="{{route('CMS.menu.list')}}">Kategori List</a>
            <div class="title_left">
                <h3>Sub_Kategori <small>Add</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <form class="form-horizontal form-label-left" action="{{route('CMS.menu.createsub_post')}}" method="post" enctype="multipart/form-data">
                       {{csrf_field()}}
                        <div class="form-group">
                            <h2>Kategori Name</h2>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="menu_id" class="form-control" style="width: 250px" >
                                    @foreach($menus as $menu)
                                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h2>Sub_Kategori Name</h2>
                            <div class="col-sm-12">
                                <input name="subname" style="width: 250px" type="text" id="subname" class="form-control" placeholder="Kategori Name">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <button onclick="return confirm('Yeni Sub_Kategori Eklensin mi?')" type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
