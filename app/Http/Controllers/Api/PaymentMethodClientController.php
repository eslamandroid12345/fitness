<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentMethodClientResource;
use App\Models\PaymentMethodClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentMethodClientController extends Controller{



    public function createNewPayment(Request $request): JsonResponse{


        $allPaymentOfClientAuth = PaymentMethodClient::query()
            ->where('user_id','=',Auth::guard('user-api')->id())
            ->where('number','=',$request->number)
            ->first();

          if($allPaymentOfClientAuth){

              return self::returnResponseDataApi(null,"Payment Already Exists",201,201);
          }else{

              $newPayment = PaymentMethodClient::create([

                  'user_id' => Auth::guard('user-api')->id(),
                  'number' => $request->number,
                  'exp_month' => $request->exp_month,
                  'exp_year' => $request->exp_year,
                  'cvc' => $request->cvc
              ]);


              if($newPayment){

                  return self::returnResponseDataApi(null,"Payment Created successfully",200,200);

              }else{

                  return self::returnResponseDataApi(null,"Something Error from server please contact with Backend",500,500);

              }
          }
    }



    public function selectAllPayments(): JsonResponse{


        $allPaymentsOfClient = PaymentMethodClient::query()
            ->where('user_id','=',Auth::guard('user-api')->id())
            ->get();

        return self::returnResponseDataApi(PaymentMethodClientResource::collection($allPaymentsOfClient),"All Payments of client get successfully",200);

    }

}
