<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">

        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link active">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('dokter')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dokter
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('pasien')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Pasien
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('poli')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Poli
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('obat')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Obat
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <li class="nav-item">
            <form action="">
                <button><a href="pages/widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Metu
                    </p>
                </a></button>
            </form>
        </li>

    </ul>
</nav>