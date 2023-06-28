@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('sidebar.clients_subscribes')}}
    @stop
@endsection

@section('PageText')

    {{trans('sidebar.clients_subscribes')}}

@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('sidebar.clients_subscribes')}}

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
                                <br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>



                                            <th>#</th>
                                            <th>{{trans('crud.client_name')}}</th>
                                            <th>{{trans('crud.program')}}</th>
                                            <th>{{trans('crud.subscribe_date')}}</th>
                                            <th>{{trans('crud.total_amount')}}</th>

                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($subscribes as $subscribe)
                                            <tr>
                                                <td>{{ $subscribe->id }}</td>
                                                <td>{{$subscribe->user->full_name }}</td>
                                                <td>{{lang() == 'ar' ? $subscribe->program->name_ar :  $subscribe->program->name_en}}</td>
                                                <td>{{$subscribe->subscribe_date }}</td>
                                                <td>{{$subscribe->total_amount }}</td>

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
