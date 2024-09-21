<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="d-none d-md-inline" style="margin-right: 10px; color:black">{{Auth::user()->name}}</span>
                <img src="{{ asset('assets/dist/img/hijab.png')}}" class="user-image img-circle elevation-2"
                    alt="User Image">
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header" style="background-color: rgb(169, 41, 219)">
                    <img src="{{ asset('assets//dist/img/hijab.png')}}" class="img-circle elevation-2" alt="User Image">
                    <p style="color: white">
                        {{ Auth::user()->name }}
                    </p>
                    <span style="color: white">{{ Auth::user()->level }}</span>
                </li>

                <li class="user-footer">
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
