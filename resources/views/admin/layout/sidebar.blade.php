
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
      <!--begin::Brand Link-->
      <a href="./index.html" class="brand-link">
        <!--begin::Brand Image-->
        <img
          src="../../dist/assets/img/logo.png"
          class="brand-image opacity-75 shadow"
        />
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">RéunionFacile</span>
        <!--end::Brand Text-->
      </a>
      <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="menu"
          data-accordion="false"
        >
       <li class="nav-item {{ request()->routeIs('reunions.*') || request()->routeIs('participants.*') || request()->routeIs('salles.*') || request()->routeIs('notifications.*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('reunions.*') || request()->routeIs('participants.*') || request()->routeIs('salles.*') || request()->routeIs('notifications.*') ? 'active' : '' }}">
        <i class="nav-icon bi bi-calendar"></i>
        <p>RéunionFacile</p>
        <i class="nav-icon bi bi-chevron-down ms-auto"></i>
    </a>
            <ul class="nav nav-treeview">
               
                <li class="nav-item">
                    <a href="{{ route('reunions.index') }}" class="nav-link {{ request()->routeIs('reunions.index') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i>
                        <p>Reunions</p>
                    </a>
                </li>
                  <li class="nav-item">
                <a href="{{ route('participants.index', App\Models\Reunion::first()->id ?? 0) }}" class="nav-link {{ request()->routeIs('participants.index') ? 'active' : '' }}"> 
                    <i class="bi bi-people-fill"></i>

                        <p>Participants</p>
                    </a>
                </li>
                  <li class="nav-item">
                    <a href="{{ route('notifications.index') }}" class="nav-link {{ request()->routeIs('notifications.index') ? 'active' : '' }}">
                        <i class="bi bi-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                  <li class="nav-item">
                    <a href="{{ route('salles.index') }}" class="nav-link {{ request()->routeIs('salles.index') ? 'active' : '' }}">
                        <i class="bi bi-building"></i>
                        <p>Salles</p>
                    </a>
                </li>
                
                
            </ul>
        </li>
        </ul>
        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
  </aside>
