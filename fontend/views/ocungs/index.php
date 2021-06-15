<!-- BREADCRUMBS SETCTION START -->
<?php require_once 'helpers/Helper.php' ?>
<!--<div class="breadcrumbs-section plr-200 mb-80">-->
<!--    <div class="breadcrumbs overlay-bg" style="background-image: url('assets/img/breadcrumb/1.png')">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-12">-->
<!--                    <div class="breadcrumbs-inner">-->
<!--                        <h1 class="breadcrumbs-title">Danh Sách Sản Phẩm</h1>-->
<!--                        <ul class="breadcrumb-list">-->
<!--                            <li><a href="trang-chu">Trang Chủ</a></li>-->
<!--                            <li>Danh Sách Sản Phẩm</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<div id="page-content" class="page-wrapper">

    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-content">
                        <!-- shop-option start -->
                        <!-- shop-option end -->
                        <!-- Tab Content start -->
                        <div class="tab-content">
                            <!-- grid-view -->
                            <div role="tabpanel" class="tab-pane active" id="grid-view">
                                <div class="row">
                                    <?php foreach ($ocungs as $ocung):
                                        $ocung_name = $ocung['name'];
                                        $ocung_slug = Helper::getSlug($ocung_name);
                                        $ocung_id = $ocung['id_harddrive'];
                                        $ocung_link = "chi-tiet-ram/$ocung_slug/$ocung_id";
                                        ?>
                                        <!-- product-item start -->
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img"
                                                     style="height: 263px;width: 263px;align-items:center;display: flex">
                                                    <a href="<?php echo $ocung_link ?>">
                                                        <img src="../backend/assets/uploads/<?php echo $ocung['picture'] ?>"
                                                             alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="<?php echo $ocung_link ?>"><?php echo $ocung['name'] ?></a>
                                                    </h6>
                                                    <h3 class="pro-price"><?php echo number_format($ocung['price']) ?> VNĐ</h3>
                                                    <ul class="action-button">
                                                        <li>
                                                            <i class="fa fa-eye"></i><?php echo $ocung['views'] ?>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Add to cart"><i
                                                                        class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product-item end -->
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>
                        <!-- Tab Content end -->
                        <!-- shop-pagination start -->
                        <div style="text-align: center">
                            <?php echo $page ?>
                        </div>

                        <!-- shop-pagination end -->
                    </div>
                </div>
                <style>
                    input {
                        font-size: 16px;
                    }

                    span {
                        font-size: 16px;
                    }
                </style>

            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->

</div>
<!-- End page content -->
