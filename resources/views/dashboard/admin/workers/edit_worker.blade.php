@extends('dashboard.admin.home')
@section('admin')


    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger"><strong>{{ Session::get('error') }}</strong></div>
    @endif

    <div class="py-12">

     <div class="container">
         <div class="row">

 <div class="col-md-12">
   <div class="card">
     <div class="card-header">Edit Worker</div>
     <div class="card-body">

     <form action="{{ url('admin/update/worker/'.$worker->id) }}" method="POST" enctype="multipart/form-data">
       @csrf
       <input type="hidden" name="old_image" value="{{ $worker->id_photo }}">
       <input type="hidden" name="old_image2" value="{{ $worker->personal_photo }}">



       <div class="form-layout">
        <div class="row mg-b-25">
       <div class="col-lg-4">
       <div class="form-group">
           <label for="exampleFormControlInput1" class="form-label">Worker First Name</label>
           <input class="form-control" type="text" name="first_name" value="{{ $worker->first_name }}">
           <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
           </div>
       </div>


           <div class="col-lg-4">
                <div class="form-group">
               <label for="exampleFormControlInput1" class="form-label">Worker Last Name</label>
               <input class="form-control" type="text" name="last_name" value="{{ $worker->last_name }}">
               <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
               </div>
           </div>

           <div class="col-lg-4">
            <div class="form-group">
           <label for="exampleFormControlInput1" class="form-label">Worker Mother Name</label>
           <input class="form-control" type="text" name="mother_name" value="{{ $worker->mother_name }}">
           <span class="text-danger">@error('mother_name'){{ $message }}@enderror</span>
           </div>
       </div>

        <div class="col-lg-4">
              <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Worker Phone Number</label>
            <input class="form-control" type="text" name="phone_number" value="{{$worker->phone_number}}">
            <span class="text-danger">@error('phone_number'){{ $message }}@enderror</span>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Worker ID Number</label>
        <input class="form-control" type="text" name="id_number" value="{{ $worker->id_number }}">
        <span class="text-danger">@error('id_number'){{ $message }}@enderror</span>
        </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">National Number</label>
        <input class="form-control" type="text" name="national_number" value="{{$worker->national_number}}">
        <span class="text-danger">@error('national_number'){{ $message }}@enderror</span>
        </div>
       </div>


        <div class="col-lg-4">
            <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Descrption</label>
        <input class="form-control" type="text" name="description" value="{{$worker->description}}" placeholder="Edit Descrption">
        <span class="text-danger">@error('description'){{ $message }}@enderror</span>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Worker Password</label>
            <input class="form-control" type="password" name="password" id="myInput" placeholder="Edit Password">
            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
            </div>
            <input type="checkbox" onclick="myFunction()">Show Password
    </div>

    <div class="col-lg-4">
        <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Service</label>
    <input class="form-control" type="text" name="service" value="{{ $worker->service }}">
    <span class="text-danger">@error('service'){{ $message }}@enderror</span>
    </div>
    </div>


    </div>
    </div>
    <br>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Workshop Address</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="workshop_address">
            {!! $worker->workshop_address !!}
        </textarea>
        <span class="text-danger">@error('workshop_address'){{ $message }}@enderror</span>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">ID photo</label>
        <input type="file" name="id_photo" class="form-control" id="exampleInputEmail1"
        aria-describedby="emailHelp" value="{{ $worker->id_photo }}">
        @error('id_photo')
                <spam class="text-danger">{{ $message }}</spam>
        @enderror
    </div>

    <div class="form-group">
        <img src="{{ asset($worker->id_photo) }}" style="width:400px; heigh:200px">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Personal photo</label>
        <input type="file" name="personal_photo" class="form-control" id="exampleInputEmail1"
        aria-describedby="emailHelp" value="{{ $worker->personal_photo }}">
        @error('personal_photo')
                <spam class="text-danger">{{ $message }}</spam>
        @enderror
    </div>
    <div class="form-group">
        <img src="{{ asset($worker->personal_photo) }}" style="width:400px; heigh:200px">
    </div>


    <div class="form-footer pt-4 pt-5 mt-4 border-top">
        <button type="submit" class="btn btn-primary btn-default">Update</button>
     </div>
</form>
</div>
</div>
</div>

{{-- Check box to hide password --}}
<script>
function myFunction() {
var x = document.getElementById("myInput");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
</script>

@endsection
