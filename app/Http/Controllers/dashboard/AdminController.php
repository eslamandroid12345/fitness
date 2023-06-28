<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\UserSubscribe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller{



    public function all(){

        return "Hello";
    }

    public function welcome(){

        return view('welcome');
    }


    public function login(){

     return view('admin.auth.login');

    }


    public function loginProcess(Request $request){

        $validator = Validator::make($request->all(),[

            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        if(auth('admin')->attempt(['email' => $request->email,'password' => $request->password])){

            toastr()->success(trans('auth_admin.success_message'));
            return redirect('/');

        }else{

            toastr()->error(trans('auth_admin.error_message'));
            return redirect()->back();
        }

    }



    public function register(){

        return view('admin.auth.register');

    }



    public function registerProcess(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(),[

            'image' => 'required|mimes:jpg,png,jpeg',
            'full_name' => 'required|min:4',
            'email' => 'required|unique:admins,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }else{

            if ($image = $request->file('image')) {

                $destinationPath = 'uploads/admins';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['image'] = "$profileImage";
            }

            Admin::create([

                'full_name' =>  $request->full_name,
                'email' =>  $request->email,
                'password' =>  Hash::make($request->password),
                'image' =>   $profileImage,

            ]);


            toastr()->success('Admin created successfully');

            return redirect()->route('admins.all');
        }

    }




    public function logout(Request $request): RedirectResponse{

        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toastr()->error(trans('auth_admin.logout_message'));
        return redirect()->route('admin.login');

    }


    public function contacts(){


        $contacts = Contact::query()
            ->with(['user:id,full_name,email'])
            ->get();


        return view('contacts.index',compact('contacts'));

    }


    public function allSubscribes(){


        $subscribes = UserSubscribe::query()
            ->with(['user:id,full_name,email','program:id,name_ar,name_en'])
            ->get();


        return view('subscribes.index',compact('subscribes'));

    }


}
