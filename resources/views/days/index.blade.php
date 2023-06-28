@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('crud.all_days')}}
    @stop
@endsection

@section('PageText')

    {{trans('crud.all_days')}}

@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('crud.all_days')}}

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
                                <a href="{{route('days.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true"> {{trans('crud.add_day')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>



                                            <th>#</th>
                                            <th>{{trans('crud.day_name')}}</th>
                                            <th>{{trans('crud.operations')}}</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($days as $day)
                                            <tr>
                                                <td>{{ $day->id }}</td>
                                                <td>{{lang() == 'ar' ? $day->name_ar : $day->name_en}}</td>

                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{trans('crud.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="#"><i style="color:green" class="fa fa-calendar"></i>&nbsp;    {{trans('crud.day_exercises')}}</a>
                                                            <a class="dropdown-item" href="{{route('days.edit',$day->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;    {{trans('crud.edit')}}</a>
                                                            <a class="dropdown-item"  href="{{route('days.delete',$day->id)}}"><i style="color: red" class="fa fa-trash"></i>&nbsp;{{trans('crud.delete')}}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
