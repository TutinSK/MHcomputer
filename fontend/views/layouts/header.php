<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/subas-preview/subas/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2019 07:20:42 GMT -->
<head>
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Duy Linh || Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/favicon.png">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="assets/lib/css/nivo-slider.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="assets/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="assets/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="assets/css/style-customizer.css">
    <!--    <link rel="stylesheet" href="assets/css/font-awesome.min.css">-->
    <link href="#" data-style="styles" rel="stylesheet">
    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Body main wrapper start -->
<div class="wrapper">

    <!-- START HEADER AREA -->
    <header class="header-area header-wrapper">
        <!-- header-top-bar -->
        <div class="header-top-bar plr-185">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 hidden-xs">
                        <div class="call-us">
                            <p class="mb-0 roboto">(+88) 01234-567890</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="top-link clearfix">
                            <ul class="link f-right">
                                <li>
                                    <a href="index.php">
                                        <i class="zmdi zmdi-account"></i>
                                        <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'My Account' ?>
                                    </a>
                                </li>
                                <li>
                                    <?php if (isset($_SESSION['username'])): ?>
                                        <a href="dang-nhap" onclick="return confirm('Bạn có muốn đăng xuất?')">
                                            <i class="zmdi zmdi-lock"></i>
                                            Logout
                                        </a>
                                    <?php else: ?>
                                        <a href="dang-nhap">
                                            <i class="zmdi zmdi-lock"></i>
                                            Login
                                        </a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-middle-area -->
        <div id="sticky-header" class="header-middle-area plr-185">
            <div class="container-fluid">
                <div class="full-width-mega-dropdown">
                    <div class="row">
                        <!-- logo -->
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="logo" style="padding: 0px">
                                <a href="index.php">
                                    <img src="assets/img/DuyLinh.png" width="114" height="100" alt="main logo">
                                </a>
                            </div>
                        </div>
                        <!-- primary-menu -->
                        <div class="col-md-8 hidden-sm hidden-xs">
                            <nav id="primary-menu">
                                <ul class="main-menu text-center">
                                    <li><a href="index.php">Trang Chủ</a>
                                    </li>
                                    <li class="mega-parent"><a href="index.php?controller=product&action=index">Sản
                                            Phẩm</a>
                                        <div class="mega-menu-area clearfix">
                                            <div class="mega-menu-link f-left">
                                                <ul class="single-mega-item">
                                                    <li class="menu-title"><b>LapTop</b></li>
                                                    <?php foreach ($manufacturers as $manufacturer):
                                                        $link1 = 'index.php?controller=product&action=hsx&id=' . $manufacturer['id_manufacturer']
                                                        ?>
                                                        <li>
                                                            <b><a href="<?php echo $link1 ?>"><?php echo $manufacturer['name_manufacturer'] ?></a></b>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
<!--                                                <ul class="single-mega-item">-->
<!--                                                    <li class="menu-title"><b>WorkStation</b></li>-->
<!--                                                    --><?php //foreach ($manufacturers as $manufacturer): ?>
<!--                                                        <li>-->
<!--                                                            <b><a href="#">--><?php //echo $manufacturer['name_manufacturer'] ?><!--</a></b>-->
<!--                                                        </li>-->
<!--                                                    --><?php //endforeach; ?>
<!--                                                </ul>-->
                                                <ul class="single-mega-item">
                                                    <li class="menu-title"><b>Linh Kiện</b></li>
                                                    <li>
                                                        <a href="index.php?controller=ram&action=index"><b>Ram</b></a>
                                                    </li>
                                                    <li>
                                                        <a href="index.php?controller=Ocung&action=index"><b>Ổ Cứng</b></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="mega-menu-photo f-left">
                                                <a href="#">
                                                    <img src="assets/img/mega-menu/menu.jpg" alt="mega menu image">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="thong-tin">Thông Tin</a>
                                    </li>
                                    <li>
                                        <a href="lien-he">Liên Hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- header-search & total-cart -->
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="search-top-cart  f-right">
                                <!-- header-search -->
                                <div class="header-search f-left">
                                    <div class="header-search-inner">
                                        <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                        <form action="" method="GET">
                                            <div class="top-search-box">
                                                <input type="hidden" name="controller" value="product">
                                                <input type="hidden" name="action" value="index">
                                                <input type="text" name="name"
                                                       placeholder="Tìm Kiếm Sản Phẩm...">
                                                <button type="submit" name="seach">
                                                    <i class="zmdi zmdi-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- total-cart -->
                                <div class="total-cart f-left">
                                    <div class="total-cart-in">
                                        <div class="cart-toggler">
                                            <a href="gio-hang-cua-ban">
                                                <span class="cart-quantity"><?php echo isset($_SESSION['card']) ? count($_SESSION['card']) : 0 ?></span><br>
                                                <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                            </a>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="top-cart-inner your-cart">
                                                    <h5 class="text-capitalize">Giỏ Hàng Của Bạn</h5>
                                                </div>
                                            </li>

                                            <li>
                                                <?php if (isset($_SESSION['card'])): ?>
                                                    <?php foreach ($_SESSION['card'] as $card): ?>
                                                        <div class="total-cart-pro">
                                                            <!-- single-cart -->

                                                            <div class="single-cart clearfix">
                                                                <div class="cart-img f-left">
                                                                    <a href="">
                                                                        <img width="50px" height="50px"
                                                                             src="../backend/assets/uploads/<?php echo $card['avatar'] ?>"
                                                                             alt="Cart Product"/>
                                                                    </a>
                                                                </div>
                                                                <div class=" f-left">
                                                                    <h6 class="text-capitalize">
                                                                        <a href="#"><?php echo $card['name'] ?></a>
                                                                    </h6>
                                                                    <p>
                                                                        <span>Hãng Sản Xuất <strong>:</strong></span><?php echo $card['hsx'] ?>
                                                                    </p>
                                                                    <p>
                                                                        <span>Giá <strong>:</strong></span><?php echo number_format($card['price']) ?>
                                                                    </p>
                                                                    <p>
                                                                        <span>Số Lượng <strong>:</strong></span><?php echo $card['quality'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                    <!-- single-cart -->
                                                <?php else: ?>
                                                    <h2>Giỏ hàng trống</h2>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner view-cart">
                                                    <h4 class="text-uppercase">
                                                        <a href="gio-hang-cua-ban">Xem Giỏ Hàng</a>
                                                    </h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER AREA -->

    <!-- START MOBILE MENU AREA -->
    <div class="mobile-menu-area hidden-lg hidden-md">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="index.php">Home</a>
                                    <ul>
                                        <li>
                                            <a href="index.php">Home Version 1</a>
                                        </li>
                                        <li>
                                            <a href="index-2.html">Home Version 2</a>
                                        </li>
                                        <li>
                                            <a href="index-3.html">Home Version 3</a>
                                        </li>
                                        <li>
                                            <a href="index-4.html">Home 4 Animated Text</a>
                                        </li>
                                        <li>
                                            <a href="index-5.html">Home 5 Animated Text Ovlerlay</a>
                                        </li>
                                        <li>
                                            <a href="index-6.html">Home 6 Background Video</a>
                                        </li>
                                        <li>
                                            <a href="index-7.html">Home 7 BG-Video Ovlerlay</a>
                                        </li>
                                        <li>
                                            <a href="index-8.html">Home 8 Boxed-1</a>
                                        </li>
                                        <li>
                                            <a href="index-9.html">Home 9 Gradient</a>
                                        </li>
                                        <li>
                                            <a href="index-10.html">Home 10 Boxed-2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="shop.html">Products</a>
                                </li>
                                <li><a href="#">Pages</a>
                                    <ul>
                                        <li>
                                            <a href="shop.html">Shop</a>
                                        </li>
                                        <li>
                                            <a href="shop-left-sidebar.html">Shop Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="shop-right-sidebar.html">Shop Right Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="shop-list.html">Shop List</a>
                                        </li>
                                        <li>
                                            <a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="single-product.html">Single Product</a>
                                        </li>
                                        <li>
                                            <a href="single-product-left-sidebar.html">Single Product Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="single-product-no-sidebar.html">Single Product No Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="cart.html">Shopping Cart</a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li>
                                            <a href="checkout.html">Checkout</a>
                                        </li>
                                        <li>
                                            <a href="order.html">Order</a>
                                        </li>
                                        <li>
                                            <a href="login.html">Login</a>
                                        </li>
                                        <li>
                                            <a href="My-account-2.html">My Account</a>
                                        </li>
                                        <li>
                                            <a href="about.html">About us</a>
                                        </li>
                                        <li>
                                            <a href="404.html">404</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a>
                                    <ul>
                                        <li>
                                            <a href="blog.html">Blog</a>
                                        </li>
                                        <li>
                                            <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">Blog Right Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="blog-2.html">Blog style 2</a>
                                        </li>
                                        <li>
                                            <a href="blog-2-left-sidebar.html">Blog 2 Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="blog-2-right-sidebar.html">Blog 2 Right Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="single-blog.html">Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
