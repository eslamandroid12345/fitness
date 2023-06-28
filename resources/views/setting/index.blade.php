@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('sidebar.setting_app')}}
    @stop
@endsection

@section('PageText')

    {{trans('sidebar.setting_app')}}

@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('sidebar.setting_app')}}

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
                                <a href="{{route('programs.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true"> {{trans('sidebar.setting_app')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>



                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('crud.email')}}</th>
                                            <th>{{trans('crud.location')}}</th>
                                            <th>{{trans('crud.privacy')}}</th>
                                            <th>{{trans('crud.operations')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                        @foreach($students as $student)--}}
                                        <tr>
                                            <td>{{  $setting->id }}</td>
                                            <td>{{$setting->email}}</td>
                                            <td>{{lang() == 'ar' ? $setting->location_ar : $setting->location_en}}</td>
                                            <td>{{lang() == 'ar' ? $setting->privacy_ar : $setting->privacy_en}}</td>

                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                     {{trans('crud.operations')}}
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{route('setting.edit',$setting->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;    {{trans('crud.edit')}}</a>
                                                        <a class="dropdown-item"  href="{{route('setting.delete',$setting->id)}}"><i style="color: red" class="fa fa-trash"></i>&nbsp;{{trans('crud.delete')}}</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{--                                        @include('pages.Students.Delete')--}}
                                        {{--                                        @endforeach--}}
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
