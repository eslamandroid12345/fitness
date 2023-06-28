<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\PrivacyResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\UserResource;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {


    public function login(Request $request): JsonResponse
    {
        try {

            $rules = [
                'email' => 'nullable|email|exists:users,email',
                'type' => 'required|in:email,phone',
                'phone' => 'nullable|numeric|exists:users,phone',
                'password' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'email.email' => 406,
                'type.in' => 407,
                'email.exists' => 408,
                'phone.exists' => 409,
            ]);

            if ($validator->fails()) {

                $errors = collect($validator->errors())->flatten(1)[0];
                if (is_numeric($errors)) {


                    $errors_arr = [
                        406 => trans('user_auth_api.email_email'),
                        407 => trans('user_auth_api.type_in'),
                        408 => trans('user_auth_api.email_exists'),
                        409 => trans('user_auth_api.phone_exists')
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return self::returnResponseDataApi(null,$errors_arr[$errors] ?? 500, $code);
                }
                return self::returnResponseDataApi(null,$validator->errors()->first(),422,422);
            }


            if($request->email == null && $request->phone == null){

                return self::returnResponseDataApi(null,trans("message_email_or_phone"),422,422);
            }

            if($request->type == 'email'){
                $token = Auth::guard('user-api')->attempt($request->only(['email', 'password']));

            }else{
                $token = Auth::guard('user-api')->attempt($request->only(['phone', 'password']));

            }

            if (!$token) {
                return self::returnResponseDataApi( null,trans('user_auth_api.message_failed') ,422);
            }


            $user = Auth::guard('user-api')->user();
            $user['token'] = $token;
            return self::returnResponseDataApi(new UserResource($user),trans('user_auth_api.message_success'),200);

        } catch (\Exception $exception) {

            return self::returnResponseDataApi($exception->getMessage(),500,false,500);
        }
    }


    public function register(Request $request): JsonResponse{

        try {

            $rules = [
                'full_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|numeric|unique:users,phone',
                'password' => 'required|min:6|max:16',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'email.email' => 406,
                'email.unique' => 408,
                'phone.unique' => 409,
            ]);

            if ($validator->fails()) {

                $errors = collect($validator->errors())->flatten(1)[0];
                if (is_numeric($errors)) {


                    $errors_arr = [
                        406 => trans('user_auth_api.email_email'),
                        408 => trans('user_auth_api.email_unique'),
                        409 => trans('user_auth_api.phone_unique')
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return self::returnResponseDataApi(null,$errors_arr[$errors] ?? 500, $code);
                }
                return self::returnResponseDataApi(null,$validator->errors()->first(),422,422);
            }

            $user = User::create([

                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),

            ]);

            if($user->save()) {

                $user['token'] = Auth::guard('user-api')->attempt($request->only(['email', 'password']));
                return self::returnResponseDataApi(new UserResource($user),trans('user_auth_api.message_success_register'),200);

            }else{

                return self::returnResponseDataApi(null,trans('user_auth_api.failed'),500);

            }

        } catch (\Exception $exception) {

            return self::returnResponseDataApi($exception->getMessage(),500,false,500);
        }

    }


    public function getProfile(Request $request): JsonResponse{

        try {

            $user = Auth::guard('user-api')->user();
            $user->token = $request->bearerToken();

            return self::returnResponseDataApi(new UserResource($user) ,trans('user_auth_api.get_profile'), 200);


        } catch (\Exception $exception) {

            return self::returnResponseDataApi($exception->getMessage(),500,500);
        }
    }


   public function editProfile(Request $request): JsonResponse{

       try {


           $rules = [
               'full_name' => 'required',
               'email' => 'required|email|unique:users,email,' .Auth::guard('user-api')->id(),
               'image' => 'nullable|image|mimes:jpg,png,jpeg',

           ];
           $validator = Validator::make($request->all(), $rules, [
               'email.email' => 406,
               'email.unique' => 407,
           ]);

           if ($validator->fails()) {

               $errors = collect($validator->errors())->flatten(1)[0];
               if (is_numeric($errors)) {


                   $errors_arr = [
                       406 => trans('user_auth_api.email_email'),
                       407 => trans('user_auth_api.email_unique'),
                   ];

                   $code = collect($validator->errors())->flatten(1)[0];
                   return self::returnResponseDataApi(null,$errors_arr[$errors] ?? 500, $code);
               }
               return self::returnResponseDataApi(null,$validator->errors()->first(),422,422);
           }

           $user = Auth::guard('user-api')->user();


           if ($image = $request->file('image')) {

               $destinationPath = 'uploads/users';
               $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
               $image->move($destinationPath, $profileImage);
               $request['image'] = "$profileImage";
           }

           $user->update([

               'full_name' => $request->full_name,
               'email' => $request->email,
               'image' =>  $request->file('image') != null ? $profileImage : $user->image,

           ]);

           if($user->save()) {

               $user['token'] = $request->bearerToken();
               return self::returnResponseDataApi(new UserResource($user),trans('user_auth_api.edit_profile'),200);

           }else{

               return self::returnResponseDataApi(null,trans('user_auth_api.failed'),500);

           }

       } catch (\Exception $exception) {

           return self::returnResponseDataApi($exception->getMessage(),500,500);
       }

   }


   public function contactUs(Request $request): JsonResponse{

       try {

           $rules = [
               'problem_description' => 'required|max:20000',

           ];
           $validator = Validator::make($request->all(), $rules, [
               'problem_description.max' => trans("user_auth_api.problem_max"),
               'problem_description.required' => trans("user_auth_api.problem_required"),
           ]);

           if ($validator->fails()) {

               return self::returnResponseDataApi(null,$validator->errors()->first(),422,422);

           }else{


               Contact::create([
                   'problem_description' => $request->problem_description,
                   'user_id' => Auth::guard('user-api')->id()
               ]);

               return self::returnResponseDataApi(null,trans("user_auth_api.problem_success"),200);
           }


           } catch (\Exception $exception) {

           return self::returnResponseDataApi($exception->getMessage(),500,500);
       }
   }


   public function privacyAndPolicy(): JsonResponse{

        $setting = Setting::query()
            ->latest()
            ->first();

        if(!$setting){

            return self::returnResponseDataApi(null,'No data inserted from database',201);

        }

        return self::returnResponseDataApi(new PrivacyResource($setting),trans("user_auth_api.privacy_success"),200);


   }


   public function settingApp(): JsonResponse{

       $setting = Setting::query()
           ->latest()
           ->first();

       return self::returnResponseDataApi(new SettingResource($setting),trans("user_auth_api.communication"),200);


   }

   public function notifications(): JsonResponse
   {

        $notifications = Notification::query()
            ->get();

       return self::returnResponseDataApi(NotificationResource::collection($notifications),"تم الحصول علي جميع الاشعارات بنجاح",200);


   }

    public function logout(): JsonResponse{

        try {
            auth('user-api')->logout();
            return self::returnResponseDataApi(null,trans('user_auth_api.logout'),200);

        } catch (\Exception $exception) {

            return self::returnResponseDataApi($exception->getMessage(),500,500);
        }
    }

}