
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        {{--<li class="nav-item d-none d-sm-inline-block">--}}
            {{--<a href="index3.html" class="nav-link">Home</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item d-none d-sm-inline-block">--}}
            {{--<a href="#" class="nav-link">Contact</a>--}}
        {{--</li>--}}
    </ul>

    <!-- SEARCH FORM -->
    {{--<form class="form-inline ml-3">--}}
        {{--<div class="input-group input-group-sm">--}}
            {{--<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
            {{--<div class="input-group-append">--}}
                {{--<button class="btn btn-navbar" type="submit">--}}
                    {{--<i class="fas fa-search"></i>--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <span class="dropdown-item dropdown-header">
                     @if(Auth::user()->user_image!=null)
                        <img src="{{asset('/storage/uploads/users/images/profilePic/'.Auth::user()->user_image)}}" class="img-circle elevation-2" alt="User Image" style="width: 100px;height: 90px;margin-left:70px;">
                    @else
                        <img src="{{url('/uploads/images/dummyUser.gif')}}" class="dropdown-item dropdown-header text-center" alt="User Image" style="width: 100px;height: 90px;margin-left:70px;">
                    @endif
                         <a href="{{url('dashboard')}}" class="d-block">{{Auth::user()->name}}</a>
                    Settings
                </span>
                <div class="dropdown-divider"></div>
                <a href="{{url('profile')}}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> View Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{url('/profile')}}" class="dropdown-item">
                    <i class="fas fa-cogs mr-2"></i> Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item"  onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>

                <div class="dropdown-divider"></div>
            </div>
        </li>

        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">--}}
                {{--<i class="fas fa-th-large"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
</nav>
<!-- /.navbar -->
