<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Admin Dashboard</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />




  <!-- PLUGINS CSS STYLE -->
  <link href="{{asset('backend/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{asset('backend/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{asset('backend/plugins/flag-icons/css/flag-icon.min.css') }} " rel="stylesheet"/>
  <link href="{{asset('backend/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{asset('backend/plugins/ladda/ladda.min.css" rel="stylesheet') }}" />
  <link href="{{asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{asset('backend/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{asset('backend/css/sleek.css') }}" />



  <!-- FAVICON -->
  <link href="{{asset('backend/img/favicon.png') }}" rel="shortcut icon" />
  <script src="{{asset('backend/plugins/nprogress/nprogress.js')}}"></script>


<style>#horizontal_scrollbar{
    overflow-x: scroll;
    width: auto;
    white-space: nowrap;
}</style>

</head>


  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
       <div id="horizontal_scrollbar">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">


     @include('dashboard.body.sidebar')


      <div class="page-wrapper">
                  <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- search form -->
              <div class="search-form d-none d-lg-inline-block">
                <div class="input-group">

                </div>
                <div id="search-results-container">
                  <ul id="search-results"></ul>
                </div>
              </div>
              <div class="navbar-right ">

                  <!-- User Account -->
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      <li class="dropdown-header">
                        <div class="d-inline-block">
                            {{ Auth::user()->name }}<small class="pt-1">{{ Auth::user()->email }}</small>
                        </div>
                      </li>
                      <li>
                        <a href="{{ route('admin.profile.update') }}">
                          <i class="mdi mdi-account"></i> My Profile
                        </a>
                      </li>
                      <li>
                        <a href=" {{ route('admin.change.password') }}">
                          <i class="mdi mdi-key"></i> Change Password
                        </a>
                      </li>
                      <li>

                      <li class="dropdown-footer">
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout.form').submit();"> <i class="mdi mdi-logout"></i> Log Out </a>
                        <form id="logout.form" action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                        </form>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </header>




        <div class="content-wrapper">
          <div class="content">
 @yield('admin')
		</div>
</div>
        </div> </div>
      </div>






<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/plugins/toaster/toastr.min.js') }}"></script>
<script src="{{ asset('backend/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('backend/plugins/charts/Chart.min.js') }}"></script>
<script src="{{ asset('backend/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('backend/plugins/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/plugins/jekyll-search.min.js') }}"></script>
<script src="{{ asset('backend/js/sleek.js') }}"></script>
<script src="{{ asset('backend/js/chart.js') }}"></script>
<script src="{{ asset('backend/js/date-range.js') }}"></script>
<script src="{{ asset('backend/js/map.js') }}"></script>
<script src="{{ asset('backend/js/custom.js') }}"></script>


  </body>
</html>

