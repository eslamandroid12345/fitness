<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller{


    public function index(){

        $setting = Setting::query()
            ->latest()
            ->first();
        return view('setting.index',compact('setting'));

    }


    public function create(){

        return view('setting.create');

    }



    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[

            'email' => 'required|email',
            'phone' => 'required|numeric',
            'location_ar' => 'required',
            'location_en' => 'required',
            'privacy_ar' => 'required',
            'privacy_en' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        Setting::create($request->all());

        toastr()->success(trans('messages.create_success'));
        return redirect()->route('setting.index');

    }


    public function edit(Setting $setting){

        return view('setting.edit',compact('setting'));

    }


    public function update(Request $request,Setting $setting): RedirectResponse{

        $validator = Validator::make($request->all(),[

            'email' => 'required|email',
            'phone' => 'required|numeric',
            'location_ar' => 'required',
            'location_en' => 'required',
            'privacy_ar' => 'required',
            'privacy_en' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }
        $setting->update($request->all());

        toastr()->success(trans('messages.update_success'));
        return redirect()->route('setting.index');
    }


    public function delete($id): RedirectResponse{

        $setting = Setting::query()
            ->find($id);

        $setting->delete();

        toastr()->success(trans('messages.delete_success'));
        return redirect()->route('setting.index');
    }
}
