@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('sidebar.all_contacts')}}
    @stop
@endsection

@section('PageText')

    {{trans('sidebar.all_contacts')}}

@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('sidebar.all_contacts')}}

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
                                            <th>{{trans('crud.client_email')}}</th>

                                            <th>{{trans('crud.problem')}}</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->id }}</td>
                                                <td>{{$contact->user->full_name }}</td>
                                                <td>{{$contact->user->email }}</td>
                                                <td>{{$contact->problem_description }}</td>

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
