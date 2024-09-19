<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Dashboard</li>
            @if (Auth::user()->level == 'admin')
                <li class="nav-item">
                    <a href="{{ route('home.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Beranda</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('kamar.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Data Kamar</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('penghuni.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Data Penghuni</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('tagihan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Data Tagihan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pelunasan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Pembayaran Lunas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('akun.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Data Akun</p>
                    </a>
                </li>
            @endif
            @if (Auth::user()->level == 'penghuni')
                <li class="nav-item">
                    <a href="{{ route('tagihanpenghuni.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Data Tagihan Penghuni</p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>
