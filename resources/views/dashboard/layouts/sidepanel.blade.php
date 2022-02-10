    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Master</div>
                    <a class="nav-link {{ Request::is('dashboard/kph*') ? 'active' : '' }}" href="{{ route('kph') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tree"></i></div>
                        KPH
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : '' }}" href="{{ route('category') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Categories
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }} " href="{{ route('user') }}" >
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Users
                    </a>
                    <div class="sb-sidenav-menu-heading">Asset</div>
                    <a class="nav-link {{ Request::is('dashboard/asset*') ? 'active' : '' }}" href="{{ route('asset') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Data Assets
                    </a>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-handshake"></i></div>
                        Approve
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ auth()->user()->name }}
                {{-- <span>{{ auth()->user()->role }}</span> --}}
            </div>
        </nav>
    </div>