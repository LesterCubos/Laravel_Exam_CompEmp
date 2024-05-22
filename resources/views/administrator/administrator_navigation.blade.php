

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #778899;">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('administrator.dashboard') }}" class="logo d-flex align-items-center">
          <img src="{{ asset('img/CopmEmpPNG.png') }}" alt="cvsu" class="rounded-circle">
          <div class="d-none d-lg-block" style="margin-left: 10px"><span>CompEmp</span></div>
        </a>
        <i class="bi bi-list toggle-sidebar-btn" style="color: #fff" ></i>
    </div><!-- End Logo -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" style="color: #fff"> 
              <div>{{ Auth::user()->name }}</div>
              <span class="d-none d-md-block dropdown-toggle ps-2" style="color: #fff"></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <a class="dropdown-item d-flex align-items-center" href="('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Logout</span>
                  </a>
                </form>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

