@extends('dashboard.admin.home')
@section('admin')

<div class="col-lg-12">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Show Workers Details</h2>
    </div>
    <div class="card-body">
           <div class="form-layout">
             <div class="row mg-b-25">
            <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleFormControlInput1" class="form-label">First Name: </label>
                <br>
                <p>{{ $worker->first_name }}</p>
                </div>
            </div>


              <div class="col-lg-4">
                <div class="form-group">
               <label for="exampleFormControlInput1" class="form-label">Last Name: </label>
               <br>
               <p>{{ $worker->last_name }}</p>
               </div>
           </div>

            <div class="col-lg-4">
                <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Mother Name:</label>
            <br>
            <p>{{ $worker->mother_name }}</p>
            </div>
            </div>


                <div class="col-lg-4">
                    <div class="form-group">
                   <label for="exampleFormControlInput1" class="form-label">Phone Number:</label>
                   <br>
                   <p>{{ $worker->phone_number }}</p>
                   </div>
               </div>

                <div class="col-lg-4">
                      <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">ID Number:</label>
                    <br>
                    <p>{{ $worker->id_number }}</p>
                    </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">National Number:</label>
            <br>
            <p>{{ $worker->national_number }}</p>
            </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Service:</label>
            <br>
            <p>{{ $worker->service }}</p>
            </div>
            </div>


            <div class="col-lg-4">
                <div class="form-group">
            <label class="form-control-label">Description:</label>
            <br>
            @if ($worker->description == NULL)
            <span class="text-danger">No Data Set</span>
            @else
            <p>{!! $worker->description !!}</p>
            @endif
            </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
            <label class="form-control-label">Workshop Address:</label>
            <br>
            @if ($worker->workshop_address == NULL)
            <span class="text-danger">No Data Set</span>
            @else
            <p>{!! $worker->workshop_address !!}</p>
            @endif
            <br>
            <hr>
            </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Personal Photo:</label>
            <br>
            <label class="custom-file">
                @if ($worker->personal_photo == 0 || $worker->personal_photo ==  NULL)
                <span class="text-danger">There is no photo</span>
                @else
                <img src="{{  URL::to($worker->personal_photo) }}" style="height:200px; width:200px;">
                @endif
              </label>
            </div>
            </div>



            <div class="col-lg-4">
                <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">ID Photo:</label>
            <br>
            <label class="custom-file">
                <img src="{{  URL::to($worker->id_photo) }}" style="height:300px; width:600px;" >
              </label>
            </div>
            </div>


        </div>
    </div>
    </div>
</div>
</div>

@endsection
