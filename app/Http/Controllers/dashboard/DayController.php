<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Program;
use App\Models\Week;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DayController extends Controller{

    public function allDays($id){

        $week = Week::query()
            ->where('id','=',$id)
            ->first();
        if(!$week){
            abort(404);
        }

        $days = Day::query()
            ->where('week_id','=',$week->id)
            ->get();

        return view('days.index',compact('days'));

    }


    public function create(){

        return view('days.create');

    }



    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[

            'name_ar' => 'required',
            'name_en' => 'required',
            'week_id' => 'required|exists:weeks,id',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }



        Day::create([

            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'week_id' => $request->week_id,

        ]);



        toastr()->success(trans('messages.create_success'));
        return redirect()->back();

    }


    public function edit(Day $day){

        return view('days.edit',compact('day'));

    }


    public function update(Request $request,Day $day): RedirectResponse{

        $validator = Validator::make($request->all(),[

            'name_ar' => 'required',
            'name_en' => 'required',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }



        $day->update([

            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,

        ]);



        toastr()->success(trans('messages.create_success'));
        return redirect()->back();

    }


    public function delete($id): RedirectResponse{


        $day = Day::query()
            ->find($id);

        $day->delete();

        toastr()->success(trans('messages.delete_success'));
        return redirect()->back();
    }

}
