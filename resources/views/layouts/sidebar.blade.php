
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">MyPayroll</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">MP</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item @if (Request::segment(1) == 'dashboard') active @endif">
                <a href="{{route('dashboard')}}" class="nav-link">
                  <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
              </li>
              <li class="menu-header">Menu</li>
              <li class="nav-item dropdown @if (Request::segment(1) == 'konfigurasi' and Request::segment(2) == 'setup') active @endif">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Konfigurasi</span></a>
                <ul class="dropdown-menu">
                  <li class="@if (Request::segment(1) == 'konfigurasi' and Request::segment(2) == 'setup') active @endif">
                    <a class="nav-link" href="{{route('setup.index')}}">Setup Aplikasi</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
              </li>
              <li class="@if (Request::segment(1) == 'blank') active @endif"><a class="nav-link" href="{{ url('blank') }}"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
             </ul>
        </aside>
      </div>