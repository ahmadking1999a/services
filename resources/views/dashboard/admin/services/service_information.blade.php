@extends('dashboard.admin.home')
@section('admin')

<style>
    #colums_font{
        color: rgb(63, 54, 54);
    }
    #myInput {
      background-image: url('/css/searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 0px solid #ddd;
      margin-bottom: 12px;
    }
</style>


<div class="row">
    <div class="col-md-12">
      <div class="header">
        <h4 style="padding:10px" class="title">Servies Information</h4>
      </div>
      <div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
     <input class="form-control" type="text" id="myInput" placeholder="Search ..." onkeyup="searchTableColumns()">
    <table class="table table-bordered table-condensed " id="myTable">
     <thead class="thead-dark">
     <tr>
     <th scope="col" width="5%">Serial Number</th>
     <th scope="col" width="15%">Service</th>
     <th scope="col" width="15%">Service Icon</th>
     <th scope="col" width="15%">Created At</th>
     <th scope="col" width="15%">Updated At</th>
     <th scope="col" >Action</th>
   </tr>
 </thead>
 <tbody>
     @foreach ($services as $service)
     <tr id="colums_font">
     <th scope="row">{{ $services->firstItem()+$loop->index  }}</th>
     <td>{{ $service->service_name }}</td>
     <td>
        @if ($service->service_icon == NULL || $service->service_icon == 0 )
        <span class="text-danger">No Date Set</span>
        @else
        <img src="{{ asset( $service->service_icon ) }}" style="height:40px; wigth:70px;">
         @endif
    </td>
     <td>
       @if ($service->created_at == NULL)
       <span class="text-danger">No Date Set</span>
       @else
      {{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}
        @endif
   </td>
   <td>
       @if ($service->updated_at == NULL)
       <span class="text-danger">No Date Set</span>
       @else
      {{ Carbon\Carbon::parse($service->updated_at)->diffForHumans() }}
        @endif
   </td>
    <td>
         <a href="{{ url('admin/service/delete/'.$service->id) }}" onclick="return confirm('Are you sure that you want to delete this')" class="btn btn-danger">Delete</a>
         <a href="{{ url('admin/edit/service/' .$service->id)}}" class="btn btn-info">Edit</a>
       </td>
   </tr>
   @endforeach
</tbody>
</table>
{{ $services->links() }}
</div>
</div>


<script>
    function searchTableColumns() {
          // Declare variables
          var input, filter, table, tr, i, j, column_length, count_td;
          column_length = document.getElementById('myTable').rows[0].cells.length;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 1; i < tr.length; i++) { // except first(heading) row
            count_td = 0;
            for(j = 0; j < column_length-1; j++){ // except first column
                td = tr[i].getElementsByTagName("td")[j];
                /* ADD columns here that you want you to filter to be used on */
                if (td) {
                  if ( td.innerHTML.toUpperCase().indexOf(filter) > -1)  {
                    count_td++;
                  }
                }
            }
            if(count_td > 0){
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
          }

        }
</script>


@endsection


