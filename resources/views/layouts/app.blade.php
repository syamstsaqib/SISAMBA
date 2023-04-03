<!DOCTYPE html>
<html lang="en">

<head>
  @yield('style')
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  @include('sweetalert::alert')
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">SISAMBA</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('/storage/'.auth()->user()->foto) }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->nama }}</span>
            
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->nama }}</h6>
              <span>{{ auth()->user()->role}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              {!! Form::open(['url'=>'/logout','method' => 'post']) !!}
              <button class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </button>
              {!! Form::close() !!}
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    @if(auth()->user()->role == 'WaliSiswa')
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Menu WaliSiswa</li>

      <li class="nav-item">
        <a class="nav-link " href="/walisiswa/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="/walisiswa/profile">
          <i class="bi bi-person"></i>
          <span>Profile siswa</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link" href="/walisiswa/lihatpresensi">
          <i class="bi bi-question-circle"></i>
          <span>Lihat Presensi siswa</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link " href="/walisiswa/lihatnilai">
          <i class="bi bi-envelope"></i>
          <span>Lihat Nilai siswa</span>
        </a>
      </li><!-- End Contact Page Nav -->
    </ul>
    @elseif(auth()->user()->role == 'Guru')
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Menu Guru</li>
      <li class="nav-item">
        <a class="nav-link" href="/guru/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link" href="/guru/profile">
          <i class="bi bi-person"></i>
          <span>Profile Guru</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link " href="/guru/datasiswa">
          <i class="fas fa-users"></i>
          <span>Data siswa</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      <li class="nav-item">
        <a class="nav-link" href="/guru/absensi">
          <i class="bi bi-question-circle"></i>
          <span>Presensi siswa</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link " href="/guru/nilaisiswa">
          <i class="bi bi-envelope"></i>
          <span>Nilai siswa</span>
        </a>
      </li><!-- End Contact Page Nav -->
      {{-- <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Rekap</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Rekap Presensi</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Rekap Nilai</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav --> --}}
    </ul>

    @elseif(auth()->user()->role == 'Admin')
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Menu Admin</li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="/admin/datasiswa">
          <i class="fas fa-users"></i>
          <span>Data Siswa</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      <li class="nav-item">
        <a class="nav-link " href="/admin/dataguru">
          <i class="fas fa-user-tie"></i>
          <span>Data Guru</span>
        </a>
      </li><!-- End Contact Page Nav -->
      <li class="nav-item">
        <a class="nav-link " href="/admin/datakelas">
          <i class="fas fa-school"></i>
          <span>Data Kelas</span>
        </a>
      </li><!-- End Contact Page Nav -->
      <li class="nav-item">
        <a class="nav-link" href="/admin/datamapel">
          <i class="fas fa-atlas"></i>
          <span>Data Mapel</span>
        </a>
      </li><!-- End Contact Page Nav -->
    </ul>
    @endif
  </aside><!-- End Sidebar-->
  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @yield('script')
</body>

</html>