@extends('dashboard.admin.home')
@section('admin')

<div class="col-lg-12">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Show Users Details</h2>
    </div>
    <div class="card-body">
           <div class="form-layout">
             <div class="row mg-b-25">
            <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">First Name: </label>
                <br>
                <p>{{ $user->first_name }}</p>
                </div>
            </div>


              <div class="col-lg-4">
                <div class="form-group">
               <label for="exampleFormControlInput1" class="form-label">Last Name: </label>
               <br>
               <p>{{ $user->last_name }}</p>
               </div>
           </div>

                <div class="col-lg-4">
                    <div class="form-group">
                   <label for="exampleFormControlInput1" class="form-label">Phone Number:</label>
                   <br>
                   <p>{{ $user->phone_number }}</p>
                   </div>
               </div>


            <div class="col-lg-12">
                <div class="form-group">
            <label class="form-control-label">Address:</label>
            <br>
            @if ($user->address == NULL)
            <span class="text-danger">No Data Set</span>
            @else
            <p>{!! $user->address !!}</p>
            @endif
            <br>
            <hr>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>

@endsection
