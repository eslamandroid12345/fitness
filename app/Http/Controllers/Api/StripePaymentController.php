<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProgramDetailSubscribeResource;
use App\Models\Program;
use App\Models\UserSubscribe;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;

class StripePaymentController extends Controller
{


    public function programDetailSubscribe($id): JsonResponse
    {

        $program = Program::query()
            ->where('id','=',$id)
            ->first();

        if(!$program){

            return self::returnResponseDataApi(null,"الخطه غير موجوده",404,404);
        }

        return self::returnResponseDataApi(new ProgramDetailSubscribeResource($program),"تم الحصول علي تفاصيل الخطه بنجاح",201,201);


    }
    public function stripePost(Request $request,$id): JsonResponse
    {

        try {


            $program = Program::query()
                ->where('id','=',$id)
                ->first();

            if(!$program){

                return self::returnResponseDataApi(null,"الخطه غير موجوده",404,404);
            }

            $clientSubscription = UserSubscribe::query()
                ->where('program_id','=',$program->id)
                ->where('user_id','=',Auth::guard('user-api')->id())
                ->first();

            if($clientSubscription){

                return self::returnResponseDataApi(null,"تم الاشتراك في هذه الخطه من قبل",201,201);

            }else{

                $stripe = new Stripe\StripeClient(
                    env('STRIPE_SECRET')
                );

                $res = $stripe->tokens->create([

                    'card' => [
                        'number' => $request->number,
                        'exp_month' => $request->exp_month,
                        'exp_year' => $request->exp_year,
                        'cvc' => $request->cvc,
                    ]

                ]);

                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $response = $stripe->charges->create([
                    'amount' =>  $program->price * 100,
                    'currency' => 'usd',
                    'source' => $res->id,
                    'description' => "Plan Subscribe",
                ]);


                UserSubscribe::create([
                    'user_id' => Auth::guard('user-api')->id(),
                    'program_id' => $program->id,
                    'currency' => 'usd',
                    'total_amount' =>  $program->price,
                    'subscribe_date' => Carbon::now()->format('Y-m-d')
                ]);

                return self::returnResponseDataApi(null,$response->status,200);
            }



        }catch (\Exception $exception){

            return self::returnResponseDataApi(null,$exception->getMessage(),500,500);

        }

    }
}
