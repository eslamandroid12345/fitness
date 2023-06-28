<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProgramAllResource;
use App\Http\Resources\ProgramDetailResource;
use App\Http\Resources\ProgramResource;
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
