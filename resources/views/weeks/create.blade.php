@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('crud.add_week')}}
    @stop
@endsection

@section('PageText')

    {{trans('crud.add_week')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('crud.add_week')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post"  action="{{route('weeks.store')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">  {{trans('crud.add_week')}}</h6><br>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="gender">{{trans('crud.week_program_id')}} <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="program_id">
                                        <option selected disabled>{{trans('crud.week_program_id')}}...</option>
                                        @foreach($programs as $program)

                                            <option value="{{$program->id}}">{{lang() == 'ar' ? $program->name_ar : $program->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>  {{trans('crud.week_name_ar')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_ar"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>  {{trans('crud.week_name_en')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_en"  class="form-control">
                                </div>
                            </div>

                        </div>





                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('crud.save')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
