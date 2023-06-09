@extends('layouts.master')
@section('css')
    @section('title')
  عرض جميع المستويات
    @stop
@endsection

@section('PageText')
    {{__('admin_create.employees')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('admin_create.employees_list')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <a href="" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('sidebar_admin.admin_create')}}</a><br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>

                                            <th>#</th>
                                            <th>اسم المستوي</th>
                                            <th>اجراء</th>

                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($levels as $level)

                                            <tr>
                                                <td>{{$level->name}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                                            <a class="dropdown-item" href=""><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('content.update')}}</a>


                                                        </div>
                                                    </div>

                                                </td>

                                            </tr>


                                        @endforeach
                                        </tbody>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
{{--<td>--}}
{{--    <img style="width: 80px;height: 80px;border-radius: 4px"--}}
{{--         src="{{URL::to('/admins/'.$admin->image)}}">--}}
{{--</td>--}}