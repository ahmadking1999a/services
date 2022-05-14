
<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
        <a href="">
            <span class="brand-name">Admin Dashboard</span>
        </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

        <!-- sidebar menu -->


        <ul class="nav sidebar-inner" id="sidebar-menu">
            <li  class="has-sub active expand" >
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="mdi mdi-home"></i>
                <span class="nav-text">Dashboard</span> <b class="caret"></b>
                </a>
                <ul  class="collapse show"  id="dashboard"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
        <li  class="active" >
        <a class="sidenav-item-link" href="{{ route('admin.index') }}">
            <span class="nav-text">Home</span>
        </a>
        </div>
        </ul>
    </li>

<li  class="has-sub" >
    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
    aria-expanded="false" aria-controls="ui-elements">
    <i class="mdi mdi-account-multiple-outline"></i>
    <span class="nav-text">Users</span> <b class="caret"></b>
    </a>
    <ul  class="collapse"  id="ui-elements"
    data-parent="#sidebar-menu">
    <div class="sub-menu">
        <li  class="active">
            <a class="sidenav-item-link" href="{{ route('admin.users.information') }}">
                <span class="nav-text">All Users</span>
            </a>
            </li>

        <li  class="active" >
            <a class="sidenav-item-link" href="{{ route('admin.add.user') }}">
                <span class="nav-text">Add User</span>
            </a>
        </li>
        </div>
        </ul>
        </li>

    <li  class="has-sub" >
        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
        aria-expanded="false" aria-controls="pages">
        <i class="mdi mdi-briefcase-outline"></i>
        <span class="nav-text">Workers</span> <b class="caret"></b>
        </a>
        <ul  class="collapse"  id="pages"
        data-parent="#sidebar-menu">
        <div class="sub-menu">
    <li >
    <a class="sidenav-item-link" href="{{ route('admin.workers.information') }}">
        <span class="nav-text">All Workers</span>
    </a>
    </li>
    <li >
        <a class="sidenav-item-link" href="{{ route('admin.add.worker') }}">
            <span class="nav-text">Add Worker</span>
        </a>
        </li>
                </div>
                </ul>
            </li>

        <li  class="has-sub" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#p"
            aria-expanded="false" aria-controls="p">
            <i class="mdi mdi-folder-multiple-outline"></i>
            <span class="nav-text">Services</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="p"
            data-parent="#sidebar-menu">
            <div class="sub-menu">
        <li >
        <a class="sidenav-item-link" href="{{ route('admin.services.information') }}">
            <span class="nav-text">All Services</span>
        </a>
        </li>
        <li >
            <a class="sidenav-item-link" href="{{ route('admin.add.service') }}">
                <span class="nav-text">Add Service</span>
            </a>
            </li>
            <li >
                <a class="sidenav-item-link" href="{{ route('admin.user.service') }}">
                    <span class="nav-text">User's Service</span>
                </a>
                </li>
                    </div>
                    </ul>
                </li>


        <hr class="separator" />

    </div>
    </aside>







