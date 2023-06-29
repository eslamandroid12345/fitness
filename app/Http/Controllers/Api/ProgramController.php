<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DayOfExercisesResource;
use App\Http\Resources\DayResource;
use App\Http\Resources\ExerciseResource;
use App\Http\Resources\ProgramAllResource;
use App\Http\Resources\ProgramDetailResource;
use App\Models\Day;
use App\Models\Exercise;
use App\Models\Program;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProgramController extends Controller{


    public function programDetailsById($id): JsonResponse{

        $program = Program::query()
            ->where('id','=',$id)
            ->first();

        if(!$program){

            return self::returnResponseDataApi(null,"Program not found",404,404);
        }

        return self::returnResponseDataApi(new ProgramDetailResource($program),trans("program.message"),200);

    }


    public function dayDetailsById($id): JsonResponse{

        $day = Day::query()
            ->where('id','=',$id)
            ->first();

        if(!$day){

            return self::returnResponseDataApi(null,"Day not found",404,404);
        }

        $exercises = Exercise::query()
            ->where('day_id','=',$day->id)
            ->get();

           $data['day'] = new DayOfExercisesResource($day);
           $data['exercises'] = ExerciseResource::collection($exercises);

        return self::returnResponseDataApi($data,"Day details get successfully",200);

    }


    public function exerciseDetailsById($id): JsonResponse{

        $exercise = Exercise::query()
            ->where('id','=',$id)
            ->first();

        if(!$exercise){

            return self::returnResponseDataApi(null,"Exercise not found",404,404);
        }



        return self::returnResponseDataApi(new ExerciseResource($exercise),"Exercise get successfully",200);

    }

    public function programs(): JsonResponse{

        $programs = Program::query()
            ->get();


        return self::returnResponseDataApi(ProgramAllResource::collection($programs),trans("program.message"),200);

    }

    public function detailsById($id){

        $program = Program::query()
            ->where('id','=',$id)
            ->first();

        if(!$program){

            return self::returnResponseDataApi(null,"Program not found",404);
        }

//        return self::returnResponseDataApi(,200);


    }
}
