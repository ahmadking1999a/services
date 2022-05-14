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
        <h2>Add Service</h2>
    </div>

    <div class="card-body">
         <form action="{{ route('admin.store.service') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="form-layout">
             <div class="row mg-b-25">

            <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">Service Name:</label>
                <br>
                <br>
                <input class="form-control" type="text" name="service_name" placeholder="Enter Service Name"  value="{{old('service_name')}}">
                <span class="text-danger">@error('service_name'){{ $message }}@enderror</span>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group">
                 <label for="exampleInputEmail1" class="form-label">Service Icon:</label>
                 <br>
                <br>
                 <input type="file" name="service_icon" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp">
                   @error('service_icon')
                          <spam class="text-danger">{{ $message }}</spam>
                   @enderror
               </div>
             </div>


        </div>
            <br>

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
