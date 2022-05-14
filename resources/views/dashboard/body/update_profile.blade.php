@extends('dashboard.admin.home')
@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Update Admin Profile</h2>
    </div>

    @if(session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="card-body">
        <form class="form-pill" method="POST" action="{{ route('admin.update.admin.profile') }}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlPassword3">User Name</label>
                <input type="text" name="name" class="form-control" value="{{ $admin['name'] }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlPassword3">User Email</label>
                <input type="email" name="email" class="form-control" value="{{ $admin['email'] }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-default">Update</button>
        </form>
    </div>
</div>

@endsection
