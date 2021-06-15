<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu" style="padding-right: 10px">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="assets/img/user2-160x160.jpg" class="user-image" alt="User Image">

                            <span class="hidden-xs"><?php echo $_SESSION['username']?></span>

                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $_SESSION['username']?> - Web Developer
                                    <small>Thành viên từ năm 2012</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../fontend/index.php?controller=login&action=index" onclick="return confirm('Bạn có Đăng Xuất?') "
                                       class="btn btn-default btn-flat">Sign out</a>

                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $_SESSION['username']?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">LAOYOUT ADMIN</li>
                <li>
                    <a id="qlsp" href="index.php?controller=maytinh&action=index">
                        <i class="fas fa-laptop"></i> <span>Quản lí Máy Tính</span>
                        <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                    </a>
                </li>

                <li class="dropdown user user-menu">
                    <a id="qldm" href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-align-justify"></i> <span>Quản Lí Linh Kiện </span>
                        <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
                            </span>
                    </a>


                    <ul class="dropdown-menu pull-right" style="background-color:green;padding-right: 10px;width: 80%" >
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="col-lg-12">
                                <a href="index.php?controller=ocung&action=index"><i class="far fa-hdd"></i> Quản lí ổ cứng</a>
                            </div>
                            <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                        </li>
                        <li class="user-footer" style="margin-top: 40px">
                            <div class="col-lg-12">
                                <a href="index.php?controller=ram&action=index"
                                   > <i class="fas fa-memory"></i> Quản lí ram</a>

                            </div>
                            <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                        </li>
                    </ul>

                </li>

                <li>
                    <a id="qlhsx" href="index.php?controller=category&action=index">
                        <i class="fas fa-align-justify"></i> <span>Quản Lí Danh Mục</span>
                        <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                    </a>
                </li>
                <li>
                    <a id="qldh" href="index.php?controller=hsx&action=index">
                        <i class="fas fa-home"></i> <span>Quản Lí Hãng Sản Xuất</span>
                        <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                    </a>
                </li>
                <li>
                    <a id="qltk" href="index.php?controller=oder&action=index">
                        <i class="fas fa-shopping-cart"></i> <span>Quản Lí Đơn Hàng</span>
                        <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                    </a>
                </li>
                <li>
                    <a id="qltk" href="index.php?controller=acc&action=index">
                        <i class="fas fa-user"></i> <span>Quản Lí Tài Khoản</span>
                        <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
