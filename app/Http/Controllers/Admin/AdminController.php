<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Service;
use App\Models\User;
use App\Models\User\UserService;
use App\Models\Worker;
use Auth;
use Hash;

class AdminController extends Controller
{
  public function create(Request $request){
      $request->validate([
          'name'=>'required',
          'email'=>'required|email|unique:admins,email',
          'password'=>'required|min:6|max:20',
          'cpassword'=>'required|same:password'
      ],[
          'cpassword.required' => 'The confirm field is required',
          'cpassword.same'=>'The confirm password and password must match'

      ]);
      $admin = new Admin();
      $admin->name = $request->name;
      $admin->email = $request->email;
      $admin->password = Hash::make($request->password);
      $data = $admin->save();

      if($data){
          return redirect()->back()->with('success','You have registed successfully');
      }
      else{
        return redirect()->back()->with('error','Registeration Failed');
      }
  }

  public function doLogin(Request $request){
      $request->validate([
          'email'=>'required|email|exists:admins,email',
          'password'=>'required|min:6|max:20',
        ],[
            'email.exists'=>'This email is not registerd into our system',
      ]);
      $check = $request->only('email','password');
      if(Auth::guard('admin')->attempt($check)){
          return redirect()->route('admin.index')->with('success','Welcome to admin dashboard');
      }
      else{
          return redirect()->back('error','Login Failed');
      }
  }

  public function logout(){
      Auth::guard('admin')->logout();
      return redirect('/admin/login');
  }


  public function ProfileUpdate(){
    if(Auth::user())
    {
        $admin =Admin::find(Auth::user()->id);
        if($admin)
        {
            return view('dashboard.body.update_profile',compact('admin'));
        }
    }
}

    public function UpdateProfile(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $admin = Admin::find(Auth::user()->id);
        if($admin)
        {
            $admin->name = $request['name'];
            $admin->email = $request['email'];
            $admin->save();
            return Redirect()->back()->with('success', 'Admin profile is updated successfully' );
        }
        else{
        return Redirect()->back()->with('error', 'Admin profile is not updated successfully' );
        }
    }

    public function ChangePass(){
        return view('dashboard.body.change_password');
    }

    public function UpdatePass(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:6|max:20'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword )){
                $admin = Admin::find(Auth::id());
                $admin->password = Hash::make($request->password);
                $admin->save();
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('success','Password is changed successfully');
        }
        else{
            return redirect()->back()->with('error','Current Password is invalide');
        }
    }

    public function Index(){

        $usersCount = User::count();
        $workersCount = Worker::count();
        $servicesCount = Service::count();
        $userServicesCount = UserService::count();
        return view('dashboard.admin.index',compact('usersCount','workersCount','servicesCount','userServicesCount'));
    }

}
