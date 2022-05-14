
<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title></title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('backend/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
  <link href="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{asset('backend/css/sleek.css') }}" />



  <!-- FAVICON -->
  <link href="img/trendy.PNG" rel="shortcut icon" />


  <script src=" {{ asset('backend/plugins/nprogress/nprogress.js') }}"></script>
</head>

</head>
  <body class="bg-light-gray" id="body">
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="">
                  <span class="brand-name">My Services Dashboard</span>
                </a>
              </div>
            </div>

            @if(Session::has('success'))
            <div class="alert alert-success"><strong> {{ Session::get('success') }}</strong></div>
             @endif
             @if(Session::has('error'))
             <div class="alert alert-danger"><strong>{{ Session::get('error') }}</strong></div>
             @endif
            <div class="card-body p-5">
              <h4 class="text-dark mb-5">Sign In</h4>
              <form method="POST" action="{{ route('admin.dologin') }}">
                @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="email" name="email" class="form-control input-lg" aria-describedby="emailHelp" placeholder="Email" required value="{{old('email')}}">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" name="password" class="form-control input-lg" placeholder="Password" required>
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      <div class="d-inline-block mr-3">


                      </div>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4" >Sign In</button>
                    <p>Don't have an account yet ?
                      <a class="text-blue" href="{{ route('admin.register') }}">Sign Up</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright pl-0">
        <p class="text-center">&copy; 2021 Copyright
        </p>
      </div>
    </div>
</body>
</html>
