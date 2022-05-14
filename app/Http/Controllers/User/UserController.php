<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
         * login api
         *
         * @return \Illuminate\Http\Response
         */
        public function login(){
            if(Auth::attempt(['phone_number' => request('phone_number'), 'password' => request('password')])){
            /** @var \App\Models\User $user **/
                $user = Auth::user();
                $success['token'] =  $user->createToken('MyApp')-> accessToken;
                return response()->json(['success' => $success], $this-> successStatus);
            }
            else{
                return response()->json(['error'=>'Unauthorised'], 401);
            }


        }

        /**
         * Register api
         *
         * @return \Illuminate\Http\Response
         */
        public function register(Request $request)
      {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|unique:users|size:10',
            'address' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',

        ], [
            'first_name.required' => 'أرجاء ادخال الاسم الأول',
            'last_name.required' => 'أرجاء ادخال الاسم الأخير',
            'phone_number.required' => 'أرجاء ادخال رقم صالح',
            'phone_number.unique' => 'الرقم موجود مسبقاً، أرجاء إدخال رقم هاتف آخر',
            'phone_number.size' => 'يجب أن يتألف رقم الهاتف من عشر أرقام',
            'address.required' => 'أرجاء ادخال عنوان صالح',
            'c_password.required' => 'ارجاء تأكيد كلمة السر',
            'c_password.same'=>'يجب أن يتوافق حقل كلمة السر مع حقل تأكيد كلمة السر',
        ]);
        // check validation
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->messages()
            ];
            return response()->json($response, 404);
        }
        $input = $request->all();//bcrypt
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['first_name'] =  $user->first_name;
        $success['last_name'] =  $user->last_name;
        $success['phone_number'] =  $user->phone_number;
        $success['address'] =  $user->address;
        return response()->json(['success'=>$success], $this-> successStatus);


    }

}
