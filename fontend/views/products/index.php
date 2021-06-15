<!-- BREADCRUMBS SETCTION START -->
<?php require_once 'helpers/Helper.php' ?>
<!--<div class="breadcrumbs-section plr-200 mb-80">-->
<!--    <div class="breadcrumbs overlay-bg" style="background-image: url('assets/img/breadcrumb/2.jpg')">-->
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
                <div class="col-md-9 col-md-push-3 col-sm-12">
                    <div class="shop-content">
                        <!-- shop-option start -->
                        <div class="shop-option box-shadow mb-30 clearfix">
                            <!-- Nav tabs -->
                            <ul class="shop-tab f-left" role="tablist">
                                <li class="active">
                                    <a href="index.php?controller=product&action=index"><i class="zmdi zmdi-view-module"></i></a>
                                </li>
                                <li>
                                    <a href="index.php?controller=product&action=index&mode=list"><i class="zmdi zmdi-view-list-alt"></i></a>
                                </li>
                            </ul>
                            <!-- short-by -->
                            <!-- showing -->

                        </div>
                        <!-- shop-option end -->
                        <!-- Tab Content start -->
                        <div class="tab-content">
                            <!-- grid-view -->
                            <div role="tabpanel" class="tab-pane active" id="grid-view">
                                <div class="row">
                                    <?php foreach ($products as $product):
                                        $product_name = $product['name_computer'];
                                        $product_slug = Helper::getSlug($product_name);
                                        $product_id = $product['id_computer'];
                                        $productnew_id_hang = $product['id_manufacturer'];
                                        $product_link = "chi-tiet-san-pham/$product_slug/$product_id/$productnew_id_hang";
                                        ?>
                                        <!-- product-item start -->
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img"
                                                     style="height: 263px;width: 263px;align-items:center;display: flex">
                                                    <a href="<?php echo $product_link ?>">
                                                        <img src="../backend/assets/uploads/<?php echo $product['picture'] ?>"
                                                             alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="<?php echo $product_link ?>"><?php echo $product['name_computer'] ?></a>
                                                    </h6>
                                                    <h3 class="pro-price"><?php echo number_format($product['price']) ?></h3>
                                                    <ul class="action-button">
                                                        <li>
                                                            <i class="fa fa-eye"></i><?php echo $product['view'] ?>
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
                <div class="col-md-3 col-md-pull-9 col-sm-12">
                    <!-- widget-search -->
                    <form action="" method="GET">
                        <aside class="widget-search mb-30">
                            <input type="hidden" name="controller" value="product">
                            <input type="hidden" name="action" value="index">
                        </aside>
                        <!-- widget-categories -->
                        <aside class="widget widget-categories box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Hãng Sản Xuất</h6>
                            <div id="cat-treeview" class="product-cat">
                                <?php foreach ($manufacturers as $manufacturer):
                                    $checked='';
                                    if(isset($_GET['hsx'])){
                                        if(in_array($manufacturer['id_manufacturer'],$_GET['hsx'])){
                                            $checked='checked';
                                        }
                                    }
                                    ?>
                                    <input type="checkbox" name="hsx[]" <?php echo $checked?>
                                           value="<?php echo $manufacturer['id_manufacturer'] ?>">
                                    <b><?php echo $manufacturer['name_manufacturer'] ?></b><br/>
                                <?php endforeach; ?>
                            </div>
                        </aside>
                        <!-- shop-filter -->
                        <aside class="widget shop-filter box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Giá</h6>
                            <div class="price_filter">
                                <?php
                                //đổ lại dữ liệu checkbox liên quan đến khoảng giá
                                //do đây là dữ liệu tĩnh lên việc check dữ liệu theo hướng có bao nhiêu input thì sẽ tạo bấy nhiêu checked tương ứng
                                $checked_price1 = '';
                                $checked_price2 = '';
                                $checked_price3 = '';
                                $checked_price4 = '';
                                $checked_price5 = '';
                                //xử lí nếu user submit đổ lại dữ liệu
                                if (isset($_GET['price'])) {
                                    if (in_array(1, $_GET['price'])) {
                                        $checked_price1 = 'checked';
                                    }
                                    if (in_array(2, $_GET['price'])) {
                                        $checked_price2 = 'checked';
                                    }
                                    if (in_array(3, $_GET['price'])) {
                                        $checked_price3 = 'checked';
                                    }
                                    if (in_array(4, $_GET['price'])) {
                                        $checked_price4 = 'checked';
                                    }
                                    if (in_array(5, $_GET['price'])) {
                                        $checked_price5 = 'checked';
                                    }
                                }
                                ?>

                                <input type="checkbox" name="price[]" <?php echo $checked_price1 ?> value="1"> <span>Dưới 5tr</span>
                                <br/>
                                <input type="checkbox" name="price[]" <?php echo $checked_price2 ?> value="2"> <span>Từ 5 - 10tr</span>
                                <br/>
                                <input type="checkbox" name="price[]" <?php echo $checked_price3 ?> value="3"> <span>Từ 10 - 15tr</span>
                                <br/>
                                <input type="checkbox" name="price[]" <?php echo $checked_price4 ?> value="4"> <span>Từ 15 - 20tr</span>
                                <br/>
                                <input type="checkbox" name="price[]" <?php echo $checked_price5 ?> value="5"> <span>Trên 20tr</span>
                                <br/>
                            </div>
                        </aside>
                        <aside class="widget shop-filter box-shadow mb-30">
                            <input type="submit" style="border-radius: 10px" name="submit" value="Tìm Kiếm" class="btn btn-primary">
                            <a style="border-radius: 10px" class="btn btn-danger" href="index.php?controller=product&action=showAll">Hủy Tìm</a>
                        </aside>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->

</div>
<!-- End page content -->
