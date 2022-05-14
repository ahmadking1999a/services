<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;
use Carbon\Carbon;
use Image;
use Hash;
use Laravel\Ui\Presets\React;

class WorkerInfoController extends Controller
{
    public function WorkersInfo(){
        $workers = Worker::latest()->paginate(5);

      //  $workers = Worker::all();
        return view('dashboard.admin.workers.workers_information',compact('workers'));
    }

    public function EditWorker($id){

        $worker = Worker::find($id);
        // $pass['password'] = bcrypt('password');
         return view('dashboard.admin.workers.edit_worker',compact('worker'));
    }

    public function DeleteWorker($id)
    {
        Worker::find($id)->delete();
        return Redirect()->back()->with('success','Worker Deleted Seccessfully');
    }

    public function NewWorker(){
        return view('dashboard.admin.workers.add_worker');

    }

    public function ShowWorker($id){

        $worker =  Worker::where('id', $id)->first();
        return view('dashboard.admin.workers.show_worker',compact('worker'));

    }

    public function StoreWorker(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mother_name' => 'required',
            'phone_number' => 'required|unique:workers|size:10',
            'id_number' => 'required|unique:workers|size:10',//How diget??
            'national_number' => 'required|unique:workers|size:10',//10 digits
            'id_photo' => 'required|mimes:png,jpg,jpeg',
            'personal_photo' => 'mimes:png,jpg,jpeg',
            'service' => 'required',
            'password' => 'required',
        ], [
            'first_name.required' => 'Please Enter Worker Frist Name',
            'last_name.required' => 'Please Enter Worker Last Name',
            'mother_name.required' => 'Please Enter Worker Mother Name',
            'phone_number.required' => 'Please Enter a Valide Number',
            'phone_number.unique' => 'The Number Already Exists.',
            'phone_number.size' => 'The Number Must be 10 Numbers',
            'id_number.required' => 'Please Enter ID Number',
            'id_number.unique' => 'The Number Already Exists.',
            'id_number.size' => 'The Number Must be 10 Numbers',
            'national_number.required' => 'Please Enter National Number',
            'national_number.unique' => 'The Number Already Exists.',
            'national_number.size' => 'The Number Must be 10 Numbers',
            'id_photo.required' => 'Please Enter ID Photo',
            'id_photo.mimes' => 'The Image Type Must be png, jpg or jpeg',
            'service.required' => 'Please Enter Service Type',
        ]);


        $id_photo = $request->file('id_photo');
        $personal_photo = $request->file('personal_photo');

       //To make a static size to the daved image :
       $name_gen = hexdec(uniqid()).'.'.$id_photo->getClientOriginalExtension();
       Image::make($id_photo)->resize(900,900)->save('image/ID_Photo/'.$name_gen);
       $last_img = 'image/ID_Photo/'.$name_gen;
       if($personal_photo == NULL){
           $last_img2 = '0';
       }
       else{
       $name_gen2 = hexdec(uniqid()).'.'.$personal_photo->getClientOriginalExtension();
       Image::make($personal_photo)->resize(900,900)->save('image/Personal_Photo/'.$name_gen2);
       $last_img2 = 'image/Personal_Photo/'.$name_gen2;
       }


       Worker::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mother_name' => $request->mother_name,
            'phone_number' => $request->phone_number,
            'id_number' => $request->id_number,
            'id_photo' => $last_img,
            'personal_photo'=>$last_img2,
            'national_number' => $request->national_number,
            'workshop_address' => $request->workshop_address,
            'description' => $request->description,
            'service' => $request->service,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('admin.workers.information')->with('success','Worker Added Successfully');
    }

    public function UpdateWorker(Request $request,$id){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mother_name' => 'required',
            'phone_number' => 'required|size:10',
            'id_number' => 'required|size:10',//How diget??
            'national_number' => 'required|size:10',//10 digits
            'id_photo' => 'mimes:png,jpg,jpeg',
            'personal_photo' => 'mimes:png,jpg,jpeg',
            'service' => 'required',
            'password' => 'required',
        ], [
            'first_name.required' => 'Please Enter Worker Frist Name',
            'last_name.required' => 'Please Enter Worker Last Name',
            'mother_name.required' => 'Please Enter Worker Mother Name',
            'phone_number.required' => 'Please Enter a Valide Number',
            'phone_number.size' => 'The Number Must be 10 Numbers',
            'id_number.required' => 'Please Enter ID Number',
            'id_number.size' => 'The Number Must be 10 Numbers',
            'national_number.required' => 'Please Enter National Number',
            'national_number.size' => 'The Number Must be 10 Numbers',
            'id_photo.mimes' => 'The Image Type Must be png, jpg or jpeg',
            'personal_photo.mimes' => 'The Image Type Must be png, jpg or jpeg',
            'service.required' => 'Please Enter Service Type',
        ]);


        $old_image = $request->old_image;
        $old_image2 = $request->old_image2;


        $id_photo = $request->file('id_photo');
        $personal_photo = $request->file('personal_photo');

        Worker::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mother_name' => $request->mother_name,
            'phone_number' => $request->phone_number,
            'id_number' => $request->id_number,
            'national_number' => $request->national_number,
            'workshop_address' => $request->workshop_address,
            'description' => $request->description,
            'service' => $request->service,
            'password' => Hash::make($request->password),
            'updated_at	' => Carbon::now(),
        ]);

        if($id_photo)
        {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($id_photo->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/ID_Photo/';
            $last_img = $up_location.$img_name;
            $id_photo->move($up_location,$img_name);
            unlink($old_image);

            Worker::find($id)->update([
                'id_photo' => $last_img,
            ]);

    }
       if($personal_photo)
       {
           $name_gen2 = hexdec(uniqid());
           $img_ext = strtolower($personal_photo->getClientOriginalExtension());
           $img_name = $name_gen2.'.'.$img_ext;
           $up_location = 'image/Personal_Photo/';
           $last_img2 = $up_location.$img_name;
           $personal_photo->move($up_location,$img_name);
           unlink($old_image2);


           Worker::find($id)->update([
               'personal_photo'=>$last_img2,
           ]);

        }
        return Redirect()->route('admin.workers.information')->with('success','Worker Updated Successfully');

}
}

