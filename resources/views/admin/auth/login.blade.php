
@extends('layouts_login.layout')
@section('title',trans('auth_admin.login'))
@section('content')

    <div class="call login-wrap p-4 p-md-5">
        <div class="d-flex">
            <div class="w-100">

                <h3 class="mb-4">{{trans('auth_admin.text')}}</h3>
            </div>

        </div>
        <form action="{{route('admin.login')}}" method="post" class="signin-form">

            @csrf
            <div class="form-group mb-3">
                <label class="label" for="name">{{trans('auth_admin.label_email')}}</label>
                <input type="email" name="email" class="form-control" placeholder="{{trans('auth_admin.email')}}" >
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="label" for="password">{{trans('auth_admin.label_password')}}</label>
                <input type="password" name="password" class="form-control" placeholder="{{trans('auth_admin.password')}}" >
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3">{{trans('auth_admin.login')}}</button>
            </div>


        </form>
    </div>

@endsection
