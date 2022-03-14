    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark img" id="sidenavAccordion" style="background-image: {{ asset('assets/img/divre.jpeg') }}">
            <div class="sb-sidenav-menu">
                {{-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                  <span class="fs-4">Sidebar</span>
                </a> --}}
                
                <ul class="nav nav-pills flex-column mb-auto mx-2">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                  </li>
                  @can('admin')
                  <li class="sb-sidenav-menu-heading">Master</li>
                    <a class="nav-link {{ Request::is('dashboard/kph*') ? 'active' : '' }}" href="{{ route('kph') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-tree"></i></div>
                        KPH
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : '' }}" href="{{ route('category') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                        Categories
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }} " href="{{ route('user') }}" >
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Users
                    </a>
                  </li>
                  @endcan

                  <li class="sb-sidenav-menu-heading">Asset</li>
                    <a class="nav-link {{ Request::is('dashboard/assets*') ? 'active' : '' }}" href="{{ route('assets') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-area"></i></div>
                        Data Assets
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/asset/depreciation*') ? 'active' : '' }}" href="{{ route('depreciation') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-gantt"></i></div>
                        Penyusutan
                    </a>

                    <li class="sb-sidenav-menu-heading">Customer</li>
                    <a class="nav-link {{ Request::is('dashboard/customers/candidates*') ? 'active' : '' }}" href="{{ route('customer') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-friends"></i></div>
                        Calon Customer
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/customers/approved*') ? 'active' : '' }}" href="{{ route('customer.approved') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-check"></i></div>
                        Customer PKS
                    </a>
                    @can('supervisor')
                  </li>
                  <li>
                    <li class="sb-sidenav-menu-heading">Approve</li>
                    <a class="nav-link {{ Request::is('dashboard/asset/approve*') ? 'active' : '' }}" href="{{ route('approve') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-handshake"></i></div>
                        Approve Asset
                    </a>
                    <a class="nav-link {{ Request::is('dashboard/customer/approve*') ? 'active' : '' }}" href="{{ route('approve.customer') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-handshake"></i></div>
                        Approve Customer
                    </a>
                    @endcan
                  </li>
                </ul>
                
              </div>


            {{-- <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    @can('admin')
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
                    @endcan

                    <div class="sb-sidenav-menu-heading">Asset</div>
                    <a class="nav-link {{ Request::is('dashboard/assets*') ? 'active' : '' }}" href="{{ route('assets') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Data Assets
                    </a>
                    @can('supervisor')
                    <a class="nav-link {{ Request::is('dashboard/approve*') ? 'active' : '' }}" href="{{ route('approve') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-handshake"></i></div>
                        Approve
                    </a>
                    @endcan
                </div>
            </div> --}}
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ auth()->user()->role }}
                {{-- <span>{{ auth()->user()->role }}</span> --}}
            </div>
        </nav>
    </div>