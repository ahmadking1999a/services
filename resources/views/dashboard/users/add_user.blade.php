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


<div class="col-lg-12">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add User</h2>
    </div>


    <div class="card-body">
         <form action="{{ route('admin.store.user') }}" method="POST">
            @csrf
           <div class="form-layout">
             <div class="row mg-b-25">
            <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">User First Name</label>
                <input class="form-control" type="text" name="first_name" placeholder="Enter First Name" value="{{old('first_name')}}">
                <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                </div>
            </div>

                <div class="col-lg-4">
                     <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">User Last Name</label>
                    <input class="form-control" type="text" name="last_name" placeholder="Enter Last Name"  value="{{old('last_name')}}">
                    <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                    </div>
                </div>

                <div class="col-lg-4">
                      <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">User Phone Number</label>
                    <input class="form-control" type="text" name="phone_number" placeholder="Enter Phone Number" value="{{old('phone_number')}}">
                    <span class="text-danger">@error('phone_number'){{ $message }}@enderror</span>
                    </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">User Password</label>
                    <input class="form-control" type="password" name="password" id="myInput" placeholder="Enter Password">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div>
                    <input type="checkbox" onclick="myFunction()">Show Password
            </div>
        </div>
    </div>
<br>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="address">
                    {!! old('address') !!}
                </textarea>
                <span class="text-danger">@error('address'){{ $message }}@enderror</span>
            </div>

            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">Add</button>
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
