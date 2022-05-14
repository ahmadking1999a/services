@extends('dashboard.admin.home')
@section('admin')

            <div class="row">
                <div class="col-sm-3">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header text-dark">Users
                            <i class="mdi mdi-account-multiple"></i>
                        </div>
                        <div class="card-body text-dark">
                          <h5 class="card-title">Number of users</h5>
                          <p class="text-right">{{ $usersCount }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header text-dark">Workers
                            <i class="mdi mdi-briefcase-outline"></i>
                        </div>
                        <div class="card-body text-dark">
                          <h5 class="card-title">Number of workers</h5>
                          <p class="text-right">{{ $workersCount }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header text-dark">Services
                          <i class="mdi mdi-folder-multiple-outline"></i>
                        </div>
                        <div class="card-body text-dark">
                          <h5 class="card-title">Number of user's services</h5>
                          <p class="text-right">{{ $userServicesCount }}</p>
                        </div>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header text-dark">Services
                          <i class="mdi mdi-folder-multiple-outline"></i>
                        </div>
                        <div class="card-body text-dark">
                          <h5 class="card-title">Number of services</h5>
                          <p class="text-right">{{ $servicesCount }}</p>
                        </div>
                    </div>
                </div>
              </div>

@endsection
