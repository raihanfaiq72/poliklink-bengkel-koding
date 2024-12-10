<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('dokter') }}" class="nav-link {{ Request::routeIs('dokter') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dokter
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('pasien') }}" class="nav-link {{ Request::routeIs('pasien') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Pasien
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('poli') }}" class="nav-link {{ Request::routeIs('poli') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Poli
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('obat') }}" class="nav-link {{ Request::routeIs('obat') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Obat
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <form action="{{route('logout')}}" method="POST">
                @csrf
                    <i class="nav-icon fas fa-th"></i>
                    <button type="submit">Keluar</button>
            </form>
        </li>

    </ul>
</nav>
