@extends('CMS.main')
@section('content')

    <div class="">
        <div class="page-title">

            <a href="{{route('CMS.menu.list')}}">Kategori List</a>
            <div class="title_left">
                <h3>Kategori <small>Add</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="{{route('CMS.menu.create_post',$urun->id)}}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}

                            <div class="form-group">
                                <h2>Kategori Name</h2>
                                <div class="col-sm-12">
                                    <input name="name" style="width: 250px" id="name"  type="text" class="form-control" placeholder="Kategori Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button onclick="return confirm('Yeni Kategori Eklensin mi?')" type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
