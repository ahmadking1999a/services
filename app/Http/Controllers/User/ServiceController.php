<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User\UserService;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ServiceController extends Controller
{
    public $successStatus = 200;

    public function getServices(){

        $services = Service::get();

        if (!$services) {
            return response()->json('Something Went Wrong in Services', 400);
        }
        return response()->json($services,200);

    }

    public function UserService(Request $request,$ser_id){

        $user = Auth::guard('api')->user()->id;

        $data =array(
            'description'=>$request->description,
            'service_id'=>$ser_id,
            'user_id'=>$user,
            'created_at' => Carbon::now(),
        );

        DB::table('user_services')->insert($data);
        $not = array(
            'message'=>'Seccess',
        );
        return response()->json([$data],$this-> successStatus);


    }
}
