<div class="sidebar" style="background-color: rgb(169, 41, 219); color: #ffffff;">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Dashboard</li>
            <li class="nav-item">
                <a href="{{ route('home.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home" style="color: #ffffff;"></i>
                    <p style="color: #ffffff;">Beranda</p>
                </a>
            </li>
            @if (Auth::user()->level == 'admin')
                <li class="nav-item">
                    <a href="{{ route('kamar.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bed" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Data Kamar</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('penghuni.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Data Penghuni</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('tagihan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Data Tagihan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pelunasan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Pembayaran Lunas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('akun.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-circle" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Data Akun</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->level == 'penghuni')
                <li class="nav-item">
                    <a href="{{ route('tagihanpenghuni.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Data Tagihan Penghuni</p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>
