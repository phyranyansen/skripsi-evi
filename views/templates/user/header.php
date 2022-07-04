
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Software Maturity Model</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/fontawesome-free/css/all.min.css';?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css';?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/icheck-bootstrap/icheck-bootstrap.min.css';?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/jqvmap/jqvmap.min.css';?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/dist/css/adminlte.min.css';?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css';?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/daterangepicker/daterangepicker.css';?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/summernote/summernote-bs4.min.css';?>">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/select2/css/select2.min.css';?>">
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css';?>">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css';?>">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/bs-stepper/css/bs-stepper.min.css';?>">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/dropzone/min/dropzone.min.css';?>">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css';?>">
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css';?>">
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css';?>">
  
  <link rel="stylesheet" href="<?= base_url().'assets/bootstrap2/dist/css/skins/_all-skins.min.css';?>">

</head>
<body class="sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#" role="button"></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <!-- <span class="badge badge-danger navbar-badge">3</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?= base_url().'assets/bootstrap2/dist/img/user.png';?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                <?= $this->session->userdata('username') ?>
                  <!-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> -->
                </h3>
                <p class="text-sm text-muted"><?= $this->session->userdata('status') ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
         
          <div class="dropdown-divider"></div>
          <?php
            if($this->session->userdata('status')=='Administrator') {
          ?>
          <a href="<?= base_url().'logout-admin'; ?>" class="dropdown-item dropdown-footer">Logout <i class="fa fa-undo" style="color: grey;"></i></a>
          <?php }elseif($this->session->userdata('status')=='Respondent') {?>
          <a href="<?= base_url().'logout'; ?>" class="dropdown-item dropdown-footer">Logout <i class="fa fa-undo" style="color: grey;"></i></a>
          <?php }else{ ?>
            <a href="<?= base_url().'logout-surveyor'; ?>" class="dropdown-item dropdown-footer">Logout <i class="fa fa-undo" style="color: grey;"></i></a>

          <?php } ?>
        </div>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url().'home'; ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  
