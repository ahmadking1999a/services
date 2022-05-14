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
     <div class="card-header">Edit Service</div>
     <div class="card-body">

     <form action="{{ url('admin/update/service/'.$service->id) }}" method="POST" enctype="multipart/form-data">
       @csrf
       <input type="hidden" name="old_image" value="{{ $service->service_icon }}">

       <div class="form-layout">
        <div class="row mg-b-25">

       <div class="col-lg-4">
       <div class="form-group">
           <label for="exampleFormControlInput1" class="form-label">Service Name</label>
           <input class="form-control" type="text" name="service_name" value="{{ $service->service_name }}">
           <span class="text-danger">@error('service'){{ $message }}@enderror</span>
           </div>
       </div>

       <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Service Icon</label>
        <input type="file" name="service_icon" class="form-control" id="exampleInputEmail1"
        aria-describedby="emailHelp" value="{{ $service->service_icon }}">
        @error('service_icon')
                <spam class="text-danger">{{ $message }}</spam>
        @enderror
    </div>
    <div class="form-group">
        @if ($service->service_icon == NULL || $service->service_icon == 0)
        <br>
        <br>
        <spam class="text-danger">No Photo Set</spam>
        @else
        <img src="{{ asset($service->service_icon) }}" style="width:100px; heigh:100px">
        @endif
    </div>

    </div>
    </div>


    </div>
    </div>
    <br>




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
