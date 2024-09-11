<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg')}}" class="user-image img-circle elevation-2"
                    alt="User Image">
                <span class="d-none d-md-inline">{{Auth::user()->username}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ asset('assets//dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">

                    <p>
                        Alexander Pierce - Web Developer
                    </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                    {{-- <a href="#" class="btn btn-default btn-flat float-right">Log out</a> --}}
                    <form action="{{ route('logout')}}" method="POST">
                       @csrf
                           <Button type="submit" class="btn btn-default btn-flat float-right">Logout
                           </Button>
                   </form>
                </li>

            </ul>
        </li>
    </ul>

</nav>
