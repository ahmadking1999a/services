@extends('dashboard.admin.home')
@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>

    @if(session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="card-body">
        <form class="form-pill" method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlPassword3">Current Password</label>
                <input type="password" name="oldpassword" class="form-control" id="current_password" placeholder="Enter Current Password">
                @error('oldpassword')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-default">Save</button>
        </form>
    </div>
</div>

@endsection
