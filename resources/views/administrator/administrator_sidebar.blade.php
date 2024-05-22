  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('administrator/dashboard')) ? 'active' : '' }}" href="{{ route('administrator.dashboard') }}" active="request()->routeIs('dashboard')">
          <i class="bx bx-grid-alt"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('companies*')) ? 'active' : '' }}" href="{{ route('companies.index') }}" active="request()->routeIs('companies.index')">
          <i class="bx bxs-business"></i>
          <span>Companies</span>
        </a>
      </li><!-- End Companies Nav -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('employees*')) ? 'active' : '' }}" href="{{ route('employees.index') }}" active="request()->routeIs('employees.index')">
          <i class="bx bxs-user-detail"></i>
          <span>Employees</span>
        </a>
      </li><!-- End Companies Nav -->
      
    </ul>

    

  </aside><!-- End Sidebar-->
