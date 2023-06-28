<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller{

    public function index(){

        $programs = Program::query()
            ->latest()
            ->get();
        return view('programs.index',compact('programs'));

    }


    public function create(){

        return view('programs.create');

    }



    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[

            'name_ar' => 'required',
            'name_en' => 'required',
            'price' => 'required|integer',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/programs';
            $programImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $programImage);
            $request['image'] = "$programImage";
        }


        Program::create([

            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $programImage,
        ]);



        toastr()->success(trans('messages.create_success'));
        return redirect()->route('programs.index');

    }


    public function edit(Program $program){

        return view('program.edit',compact('program'));

    }


    public function update(Request $request,Program $program): RedirectResponse{

        $validator = Validator::make($request->all(),[

            'name_ar' => 'required',
            'name_en' => 'required',
            'price' => 'required|integer',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        }

        if ($image = $request->file('image')) {

            $destinationPath = 'uploads/programs';
            $programImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $programImage);
            $request['image'] = "$programImage";

            if (file_exists(public_path('uploads/programs/' . $program->image))) {
                unlink(public_path('uploads/programs/' . $program->image));
            }
        }


        $program->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'image' => $programImage,
        ]);



        toastr()->success(trans('messages.update_success'));
        return redirect()->route('programs.index');
    }


    public function delete($id): RedirectResponse{


        $program = Program::query()
            ->find($id);

        $program->delete();

        toastr()->success(trans('messages.delete_success'));
        return redirect()->route('programs.index');
    }

}
