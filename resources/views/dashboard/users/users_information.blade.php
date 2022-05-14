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
      width: 60%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 0px solid #ddd;
      margin-bottom: 12px;
    }
    #myInput2 {
      background-image: url('/css/searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 60%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 0px solid #ddd;
      margin-bottom: 12px;
    }
    #myInput3 {
      background-image: url('/css/searchicon.png');
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 60%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 0px solid #ddd;
      margin-bottom: 12px;
    }
</style>


<div class="row">
    <div class="col-md-6">
      <div class="header">
        <h4 style="padding:10px" class="title">Users Information</h4>
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
                <th scope="col" width="10%">First Name</th>
                <th scope="col" width="10%">Last Name</th>
                <th scope="col" width="10%">Phone Number</th>
                <th scope="col" width="15%">Created At</th>
                <th scope="col" width="15%">Updated At</th>
                <th scope="col" >Action</th>
            </tr>
          </thead>
          <tbody>
      @foreach ($users as $user)
    <tr id="colums_font">
      <th scope="row">{{ $users->firstItem()+$loop->index  }}</th>
      <td>{{ $user->first_name }}</td>
      <td>{{ $user->last_name }}</td>
      <td>{{ $user->phone_number }}</td>
      <td>
        @if ($user->created_at == NULL)
        <span class="text-danger">No Date Set</span>
        @else
       {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
         @endif
    </td>

    <td>
        @if ($user->updated_at == NULL)
        <span class="text-danger">No Date Set</span>
        @else
       {{ Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}
         @endif
    </td>
     <td>
          <a href="{{ url('admin/user/delete/'.$user->id) }}" onclick="return confirm('Are you sure that you want to delete this')" class="btn btn-danger">Delete</a>
          <a href="{{ url('admin/edit/user/' .$user->id)}}" class="btn btn-info">Edit</a>
          <a href="{{ url('admin/show/user/' .$user->id)}}" class="btn btn-success">Show</a>
        </td>
    </tr>
    @endforeach
          </tbody>

        </table>
        {{ $users->links() }}
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

