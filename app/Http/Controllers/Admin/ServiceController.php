<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User\UserService;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;
use Image;
use Hash;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    public function ServicesInfo(){

        $services = Service::latest()->paginate(5);
        return view('dashboard.admin.services.service_information',compact('services'));
    }

    public function EditService($id){

        $service = Service::find($id);
        return view('dashboard.admin.services.edit_service',compact('service'));
    }

    public function DeleteService($id)
    {
        Service::find($id)->delete();
        return Redirect()->back()->with('success','Service Deleted Seccessfully');
    }


    public function NewService(){
        return view('dashboard.admin.services.add_service');

    }


    public function StoreService(Request $request){

        $request->validate([
            'service_name' => 'required',
            'service_icon' => 'required|mimes:png,jpg,jpeg',
        ], [
            'service_name.required' => 'Please Enter Service Name',
        ]);


        $service_i = $request->file('service_icon');

        if($service_i == NULL){
            $last_img = '0';
        }
        else{
            $name_gen = hexdec(uniqid()).'.'.$service_i->getClientOriginalExtension();
            Image::make($service_i)->resize(900,900)->save('image/ServiceIcon/'.$name_gen);
            $last_img = 'image/ServiceIcon/'.$name_gen;
        }


        Service::insert([
            'service_name' => $request->service_name,
            'service_icon' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('admin.services.information')->with('success','Service Added Successfully');
    }


    public function UpdateService(Request $request,$id){

        $request->validate([
            'service_name' => 'required',
            'service_icon' => 'mimes:png,jpg,jpeg',
        ], [
            'service_name.required' => 'Please Enter Service Name',
        ]);

        $old_image = $request->old_image;

        $ser_icon = $request->file('service_icon');

        $update = Service::find($id)->update([
            'service_name'=> $request->service_name,
            'updated_at	' => Carbon::now(),
           ]);


        if($ser_icon)
        {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($ser_icon->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/ServiceIcon/';
            $last_img = $up_location.$img_name;
            $ser_icon->move($up_location,$img_name);
            unlink($old_image);

            Service::find($id)->update([
                'service_icon' => $last_img,
            ]);

        }
        if($update){
         return Redirect()->route('admin.services.information')->with('success','Service Updated Successfully');
        }
        else{
          return redirect()->back()->with('error','Error');
        }
    }


    public function UserService(){

        $service = DB::table('user_services')
                    ->join('services','user_services.service_id','services.id')
                    ->join('users','user_services.user_id','users.id')
                    ->select('user_services.*','users.*','services.service_name')
                    ->get();

        return view('dashboard.users.service',compact('service'));

    }

    public function DeleteUserService($id){

        UserService::find($id)->delete();
        return Redirect()->back()->with('success','Deleted Seccessfully');

    }

    public function UserServiceShow($id){

        $service = DB::table('user_services')
                        ->join('services','user_services.service_id','services.id')
                        ->join('users','user_services.user_id','users.id')
                        ->select('user_services.*','users.*','services.service_name')
                        ->first();

        return view('dashboard.users.show_service',compact('service'));

    }
}
