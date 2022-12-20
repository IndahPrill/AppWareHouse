<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="<?= base_url('dashboard') ?>assets/index2.html" class="logo">
        <span class="logo-mini"><b>WH</b></span>
        <span class="logo-lg"><b>Warehouse</b></span>
      </a>

      <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>assets/dist/img/avatar.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?= base_url() ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
                  <p><?= $this->fungsi->user_login()->name ?></p>
                </li>

                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>


    <aside class="main-sidebar">
      <section class="sidebar">
        <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= ucfirst($this->fungsi->user_login()->username) ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

          <?php if ($this->session->userdata('level') == 2) { ?>
            <li><a href="<?= site_url('supplier') ?>"><i class="fa fa-ship"></i> <span>Supplier</span></a></li><?php } else if ($this->session->userdata('level') == 1) { ?> <li><a href="<?= site_url('supplier') ?>"><i class="fa fa-ship"></i> <span>Supplier</span></a></li><?php } ?>

          <?php if ($this->session->userdata('level') == 2) { ?>
            <li><a href="<?= site_url('item') ?>"><i class="fa fa-archive"></i> <span>Stock Gudang</span></a></li><?php } else if ($this->session->userdata('level') == 3) { ?>
            <li><a href="<?= site_url('item') ?>"><i class="fa fa-archive"></i> <span>Stock Gudang</span></a></li><?php } ?>

          <?php if ($this->session->userdata('level') == 2) { ?>
            <li><a href="<?= site_url('stock/in') ?>"><i class="fa fa-truck"></i> <span>Stock In</span></a></li><?php } else if ($this->session->userdata('level') == 1) { ?> <li><a href="<?= site_url('stock/in') ?>"><i class="fa fa-truck"></i> <span>Stock In</span></a></li><?php } ?>

          <?php if ($this->session->userdata('level') == 2) { ?>
            <li><a href="<?= site_url('stock/out') ?>"><i class="fa fa-shopping-cart"></i> <span>Stock out</span></a></li><?php } else if ($this->session->userdata('level') == 1) { ?> <li><a href="<?= site_url('stock/out') ?>"><i class="fa fa-shopping-cart"></i> <span>Stock out</span></a></li><?php } ?>

          <?php if ($this->session->userdata('level') == 3) { ?>
            <li><a href="<?= site_url('request') ?>"><i class="fa fa-file-text"></i> <span>Permintaan Barang</span></a></li><?php } else if ($this->session->userdata('level') == 2) { ?> <li><a href="<?= site_url('request') ?>"><i class="fa fa-file-text"></i> <span>Permintaan Barang</span></a></li><?php } ?>?>


            <?php if ($this->fungsi->user_login()->level == 1) { ?>
              <li class="header">SETTINGS</li>
              <li><a href="<?= site_url('user') ?>"><i class="fa fa-user"></i> <span>Daftar User</span></a></li><?php } ?>

            <li class="treeview"></li>

    </aside>

    <div class="content-wrapper">
      <?php echo $contents ?>
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2022 <a href="">Task</a>.</strong> All rights
      reserved.
    </footer>

  </div>
  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?= base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="<?= base_url() ?>assets/dist/js/demo.js"></script> -->
  <script>
    $(document).ready(function() {
      $('.sidebar-menu').tree()
      
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })
    })
  </script>
</body>

</html>