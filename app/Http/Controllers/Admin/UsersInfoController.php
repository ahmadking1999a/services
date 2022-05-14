<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Validator;
use Hash;

class UsersInfoController extends Controller
{
    public function UsersInfo(){

      //  $users = User::all();
        $users = User::latest()->paginate(5);
        return view('dashboard.users.users_information',compact('users'));
    }

    public function DeleteUser($id)
    {
        User::find($id)->delete();
        return Redirect()->back()->with('success','User Deleted Seccessfully');
    }

    public function UserShow($id){

        $user =  User::where('id', $id)->first();
        return view('dashboard.users.show_user',compact('user'));

    }

    public function NewUser(){
        return view('dashboard.users.add_user');

    }


    public function StoreUser(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|unique:users|size:10',
            'password' => 'required',
            'address' => 'required',
        ], [
            'first_name.required' => 'Please Enter User Frist Name',
            'last_name.required' => 'Please Enter User Last Name',
            'phone_number.required' => 'Please Enter a Valide Number',
            'phone_number.unique' => 'The Number Already Exists',
            'phone_number.size' => 'The Number Must be 10 Numbers',
            'address.required' => 'Please Enter User Address',

        ]);

        User::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('admin.users.information')->with('success','User Added Successfully');
    }

    public function EditUser($id){

        $user = User::find($id);
       // $pass['password'] = bcrypt('password');
        return view('dashboard.users.edit_user',compact('user'));
    }

    public function UpdateUser(Request $request,$id){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|size:10',
            'password' => 'required',
            'address' => 'required',
        ], [
            'first_name.required' => 'Please Enter User Frist Name',
            'last_name.required' => 'Please Enter User Last Name',
            'phone_number.required' => 'Please Enter a Valide Number',
            'phone_number.size' => 'The Number Must be 10 Numbers',
            'address.required' => 'Please Enter User Address',
        ]);

        $update = User::find($id)->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'phone_number'=> $request->phone_number,
            'password'=> $request->password,
            'address'=> $request->address,
            'updated_at	' => Carbon::now(),
           ]);

        if($update){
         return Redirect()->route('admin.users.information')->with('success','User Updated Successfully');
        }
        else{
          return redirect()->back()->with('error','Error');
        }



    }



}
