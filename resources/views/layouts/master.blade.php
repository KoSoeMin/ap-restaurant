<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Restaurant Kitchen | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
    }

    .main-header {
      background: #ffffff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .main-sidebar {
      background: linear-gradient(180deg, #212529, #343a40);
    }

    .brand-link {
      background: #343a40;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .brand-link .brand-image {
      border-radius: 50%;
    }

    .brand-text {
      font-weight: 600;
      color: #f8f9fa !important;
      letter-spacing: 0.5px;
    }

    .nav-sidebar > .nav-item > .nav-link {
      border-radius: 8px;
      margin: 10px 8px;
      transition: all 0.3s ease;
    }

    .nav-sidebar > .nav-item > .nav-link.active {
      background-color: #28a745;
      color: #fff !important;
      box-shadow: 0 2px 5px rgba(40,167,69,0.4);
    }

    .nav-sidebar > .nav-item > .nav-link:hover {
      background-color: #1e7e34;
      color: #fff !important;
    }

    .nav-sidebar .nav-icon {
      margin-right: 10px;
    }

    .user-panel {
      background: rgba(255,255,255,0.05);
      border-radius: 8px;
      padding: 10px;
    }

    .user-panel img {
      border: 2px solid #28a745;
    }

    .user-panel .info a {
      color: #f8f9fa;
      font-weight: 500;
      font-size: 15px;
    }

    .main-footer {
      background-color: #fff;
      box-shadow: 0 -2px 8px rgba(0,0,0,0.05);
      border-top: none;
      font-size: 14px;
      color: #6c757d;
    }

    .btn-default {
      border-radius: 8px;
      background-color: #f8f9fa;
      transition: all 0.2s ease-in-out;
    }

    .btn-default:hover {
      background-color: #e2e6ea;
    }

    .nav-item ul.nav-treeview .nav-link {
      padding-left: 35px;
    }

    footer strong a {
      color: #28a745;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-success" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link font-weight-semibold text-success">Kitchen Dashboard</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
      <img src="/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity:.9">
      <span class="brand-text">Restaurant</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- User Panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <li class="nav-header text-uppercase text-muted ml-2 mb-2">Management</li>
          <li class="nav-item">
            <a href="/dish" class="nav-link {{ Request::segment(1) == 'dish' ? 'active' : '' }}">
              <i class="nav-icon fas fa-hamburger"></i>
              <p>Dishes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/order" class="nav-link {{ Request::segment(1) == 'order' ? 'active' : '' }}">
              <i class="nav-icon fas fa-receipt"></i>
              <p>Orders</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Area -->
  <div>
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="main-footer d-flex justify-content-between align-items-center px-3">
    <div>
      <strong>© 2025 Restaurant Kitchen.</strong> All rights reserved.
    </div>
    <div>
      <form action="logout" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-default btn-sm">
          <i class="fas fa-sign-out-alt"></i> Logout
        </button>
      </form>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/js/adminlte.min.js"></script>
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>
</html>
