@extends('CMS.main')
@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Kategori <small>List</small></h3>
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
                                <th style="width: 10%">No</th>
                                <th style="width: 30%">Kategori Name</th>
                                <th style="width: 15%">Created Date</th>
                                <th style="width: 15%">Updated Date</th>
                                <th style="width: 30%">Edit / Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @php $x=1 @endphp
                            @foreach($menus as $menu)
                            <tr>
                                <td style="width: 10%">{{$i}}</td>
                                <td style="width: 30%">
                                    <a>{{$menu->name}}</a>
                                </td>
                                <td style="width: 15%">
                                    <small>{{$menu->created_at}}</small>
                                </td>
                                <td style="width: 15%">
                                    <small>{{$menu->updated_at}}</small>
                                </td>
                                <td style="width: 30%">
                                    <a href="{{route('CMS.menu.edit',$menu->id)}}" class="btn btn-info btn-xs">
                                        <i class="fa fa-pencil"></i> Edit </a>

                                    <a onclick="return confirm('Kategori Silinsin mi?')" href="{{route('CMS.menu.remove',$menu->id)}}" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash-o"></i> Delete </a>
                                </td>
                            </tr>
                           @foreach(\App\Models\SubMenus::where('menu_id',$menu->id)->get() as $submenu)
                            <tr>
                                <td style="width: 5%">{{$i}}.{{$x}}.</td>
                                <td style="width: 40%">
                                    <a>{{$submenu->name}}</a>
                                </td>
                                <td style="width: 10%">
                                    <small>{{$submenu->created_at}}</small>
                                </td>
                                <td style="width: 10%">
                                    <small>{{$submenu->updated_at}}</small>
                                </td>
                                <td style="width: 15%">
                                    <a href="{{route('CMS.menu.editsub',$submenu->id)}}" class="btn btn-info btn-xs">
                                        <i class="fa fa-pencil"></i> Edit </a>

                                    <a onclick="return confirm('Sub_Kategori Silinsin mi?')" href="{{route('CMS.menu.removesub',$submenu->id)}}" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash-o"></i> Delete </a>
                                </td>
                            </tr>
                                @php $x=$x+1 @endphp
                                @endforeach
                                @php $i=$i+1 @endphp
                                @php $x=1 @endphp
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
