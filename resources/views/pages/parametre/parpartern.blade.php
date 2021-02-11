<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>parametre | @yield('title')</title>
   @yield('stylcss')
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  @include('pages.parametre.nav.nav')
  <div class="content-wrapper">
    @yield('contentheader')
    @yield('content')
  </div>
  <aside class="control-sidebar control-sidebar-dark">

  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">Deal&Consulting</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@yield('styljs')
</body>
</html>
