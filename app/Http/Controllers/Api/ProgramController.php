<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProgramResource;
use App\Models\Program;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProgramController extends Controller{



    public function all(): JsonResponse{

        $programs = Program::query()
            ->get();

        return self::returnResponseDataApi(ProgramResource::collection($programs),trans("program.message"),200);

    }

    public function detailsById($id): JsonResponse{

        $program = Program::query()
            ->where('id','=',$id)
            ->first();

        if(!$program){

            return self::returnResponseDataApi(null,"Program not found",404);
        }

//        return self::returnResponseDataApi(,200);


    }
}
