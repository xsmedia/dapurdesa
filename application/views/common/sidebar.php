 <body class="vertical  light  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
                <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-bell fe-16"></span>
              <span class="dot dot-md bg-success"></span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="<?php echo base_url();?>assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87    " />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51     " />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15  " />
                </g>
              </svg>
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="<?php echo base_url('home');?>"  class="nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Main Menu</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Data Aparatur</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Kepala Desa</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-typograpy.html"><span class="ml-1 item-text">Perangkat Desa</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-icons.html"><span class="ml-1 item-text">B P D</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ui-buttons.html"><span class="ml-1 item-text">LPM</span></a>
                </li>
                
              </ul>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="widgets.html">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Kepala Desa</span>
                <span class="badge badge-pill badge-primary">New</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="<?php echo base_url('perangkat');?>">
                <i class="fe fe-shield fe-16"></i>
                <span class="ml-3 item-text">Perangkat Desa</span>
                <span class="badge badge-pill badge-success">PD</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="widgets.html">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">BPD</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="widgets.html">
                <i class="fe fe-layers fe-16"></i>
                <span class="ml-3 item-text">LPM</span>
              </a>
            </li>
          
            <li class="nav-item dropdown">
              <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-pie-chart fe-16"></i>
                <span class="ml-3 item-text">Laporan Data</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./chart-inline.html"><span class="ml-1 item-text">Kepala Desa</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./chart-chartjs.html"><span class="ml-1 item-text">Perangkat Desa</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./chart-apexcharts.html"><span class="ml-1 item-text">BPD</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./datamaps.html"><span class="ml-1 item-text">LPM</span></a>
                </li>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Apps</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
           
            <li class="nav-item dropdown">
              <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-book fe-16"></i>
                <span class="ml-3 item-text">Data Wilayah</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                <a class="nav-link pl-3" href="./contacts-list.html"><span class="ml-1">Data Desa</span></a>
                <a class="nav-link pl-3" href="./contacts-grid.html"><span class="ml-1">Data Kecamatan</span></a>
                
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">User Pengguna</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                <a class="nav-link pl-3" href="./profile.html"><span class="ml-1">Overview</span></a>
                <a class="nav-link pl-3" href="./profile-settings.html"><span class="ml-1">Settings</span></a>
                <a class="nav-link pl-3" href="./profile-security.html"><span class="ml-1">Security</span></a>
                <a class="nav-link pl-3" href="./profile-notification.html"><span class="ml-1">Notifications</span></a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-folder fe-16"></i>
                <span class="ml-3 item-text">Master Data</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="fileman">
                <a class="nav-link pl-3" href="<?php echo base_url('apps/jabatan');?>"><span class="ml-1">Jabatan</span></a>
                <a class="nav-link pl-3" href="<?php echo base_url('apps/pendidikan');?>"><span class="ml-1">Pendidikan</span></a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-compass fe-16"></i>
                <span class="ml-3 item-text">Help Desk</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="support">
                <a class="nav-link pl-3" href="./support-center.html"><span class="ml-1">Home</span></a>
                <a class="nav-link pl-3" href="./support-tickets.html"><span class="ml-1">Tickets</span></a>
                <a class="nav-link pl-3" href="./support-ticket-detail.html"><span class="ml-1">Ticket Detail</span></a>
                <a class="nav-link pl-3" href="./support-faqs.html"><span class="ml-1">FAQs</span></a>
              </ul>
            </li>
          </ul>
          
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Logout</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="../docs/index.html">
                <i class="fe fe-help-circle fe-16"></i>
                <span class="ml-3 item-text">Keluar Aplikasi</span>
              </a>
            </li>
          </ul>
          <div class="btn-box w-100 mt-4 mb-1">
            <button type="button" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-home fe-12 mr-2"></i><span class="small">Homepage</span>
            </button>
          </div>
        </nav>
      </aside>