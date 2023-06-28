<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Week;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WeekController extends Controller{

    public function allWeeks($id){

        $program = Program::query()
            ->where('id','=',$id)
            ->first();
        if(!$program){

            abort(404);
        }
        $weeks = Week::query()
            ->where('program_id','=',$program->id)
            ->get();
        return view('weeks.index',compact('weeks'));

    }


    public function create(){

        $programs = Program::query()
            ->get();
        return view('weeks.create',compact('programs'));

    }



    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[

            'name_ar' => 'required',
            'name_en' => 'required',
            'program_id' => 'required|exists:programs,id',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }



        Week::create([

            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'program_id' => $request->program_id,

        ]);



        toastr()->success(trans('messages.create_success'));
        return redirect()->back();

    }


    public function edit(Week $week){

        return view('weeks.edit',compact('week'));

    }


    public function update(Request $request,Week $week): RedirectResponse{

        $validator = Validator::make($request->all(),[

            'name_ar' => 'required',
            'name_en' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }



        $week->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,

        ]);



        toastr()->success(trans('messages.update_success'));
        return redirect()->route('programs.index');
    }


    public function delete($id): RedirectResponse{


        $week = Week::query()
            ->find($id);

        $week->delete();

        toastr()->success(trans('messages.delete_success'));
        return redirect()->back();
    }


}
