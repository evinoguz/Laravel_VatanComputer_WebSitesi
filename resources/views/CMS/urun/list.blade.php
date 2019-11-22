@extends('CMS.main')
@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Product <small>List</small></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 16%">Product Name</th>
                                <th style="width: 15%">Product Content</th>
                                <th style="width: 10%">Product Price</th>
                                <th style="width: 12%">Created Date</th>
                                <th style="width: 12%">Updated Date</th>
                                <th style="width: 30%">Edit / Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($uruns as $urun)
                                @foreach(\App\Models\Menus::where('id',$urun->menu_id)->get() as $menu)
                                    @foreach(\App\Models\SubMenus::where('id',$urun->submenu_id)->get() as $submenu)
                                <tr>
                                    <td style="width: 5%">{{$urun->id}}</td>
                                    <td style="width: 16%">
                                        <a>{{$menu->name}} / {{$submenu->name}}</a>
                                    </td>
                                    <td style="width: 15%">
                                        <a>{{$urun->content}}</a>
                                    </td>
                                    <td style="width: 10%">
                                        <a>{{number_format($urun->price,2,',','.')}}</a>
                                    </td>
                                    <td style="width: 12%">
                                        <small>{{$urun->created_at}}</small>
                                    </td>
                                    <td style="width: 12%">
                                        <small>{{$urun->updated_at}}</small>
                                    </td>
                                    <td style="width: 30%">
                                        <a href="{{route('CMS.urun.edit',$urun->id)}}" class="btn btn-info btn-xs">
                                            <i class="fa fa-pencil"></i> Edit </a>

                                        <a onclick="return confirm('Kategori Silinsin mi?')" href="{{route('CMS.urun.remove',$urun->id)}}" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash-o"></i> Delete </a>
                                    </td>
                                </tr>
                                        @endforeach
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end project list -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
