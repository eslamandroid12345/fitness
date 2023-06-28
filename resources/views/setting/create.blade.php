@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('crud.add_setting')}}
    @stop
@endsection

@section('PageText')

    {{trans('crud.add_setting')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('crud.add_setting')}}
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



                    <form method="post"  action="{{route('setting.store')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">  {{trans('crud.add_setting')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>  {{trans('crud.location_ar')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="location_ar"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>  {{trans('crud.location_en')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="location_en"  class="form-control">
                                </div>
                            </div>
                        </div>




                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{trans('crud.email')}} : </label>
                                    <input type="email"  name="email" class="form-control" >
                                </div>
                            </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{trans('crud.phone')}} : </label>
                                        <input type="text"  name="phone" class="form-control" >
                                    </div>
                                </div>





                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> {{trans('crud.privacy_ar')}} : </label>
                                    <textarea  name="privacy_ar" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> {{trans('crud.privacy_en')}} : </label>
                                    <textarea  name="privacy_en" class="form-control"></textarea>
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
