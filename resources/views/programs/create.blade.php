@extends('layouts.master')
@section('css')
    @section('title')
        {{trans('crud.add_program')}}
    @stop
@endsection

@section('PageText')

    {{trans('crud.add_program')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('crud.add_program')}}
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



                    <form method="post"  action="{{route('programs.store')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">  {{trans('crud.add_program')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>  {{trans('crud.program_name_ar')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_ar"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>  {{trans('crud.program_name_en')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_en"  class="form-control">
                                </div>
                            </div>
                        </div>




                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> {{trans('crud.program_price')}} : </label>
                                    <input type="number"  name="price" class="form-control" >
                                </div>
                            </div>





                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> {{trans('crud.program_description_ar')}} : </label>
                                    <textarea   name="description_ar" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> {{trans('crud.program_description_en')}} : </label>
                                    <textarea  name="description_en" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('crud.program_image')}} : <span class="text-danger">*</span></label>
                                <input type="file" accept="image/*" name="image">
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
