<?php require_once 'helpers/Helper.php' ?>
<div class="breadcrumbs-section plr-200 mb-80">
    <div class="breadcrumbs overlay-bg" style="background-image: url('assets/img/breadcrumb/1.png')">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Shopping Cart</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="index.html">Home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="page-content" class="page-wrapper">

    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- shopping-cart start -->
                        <div class="tab-pane active" id="shopping-cart">
                            <div class="shopping-cart-content">
                                <form action="" method="POST">
                                    <div class="table-content table-responsive mb-50">
                                        <?php
                                        if (isset($_SESSION['error'])) {
                                            //hiển thị mảng theo key trong 1 chuỗi mà ko cần nối chuỗi
                                            //sử dụng ký tự {} bao lấy mảng đó
                                            echo "<div class='alert alert-danger'>
                                                 {$_SESSION['error']}
                                                    </div>";
                                            unset($_SESSION['error']);
                                        }
                                        if (!empty($this->error)) {
                                            echo "<div class='alert alert-danger'>
        $this->error
        </div>";
                                        }
                                        if (isset($_SESSION['success'])) {
                                            //hiển thị mảng theo key trong 1 chuỗi mà ko cần nối chuỗi
                                            //sử dụng ký tự {} bao lấy mảng đó
                                            echo "<div class='alert alert-success'>
        {$_SESSION['success']}
        </div>";
                                            unset($_SESSION['success']);
                                        }
                                        ?>
                                        <?php $total = 0 ?>
                                        <?php if (isset($_SESSION['card'])): ?>
                                            <table class="text-center">
                                            <thead>
                                            <tr>
                                                <th class="product-thumbnail">Sản Phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quantity">Số Lượng</th>
                                                <th class="product-subtotal">Tổng Tiền</th>
                                                <th class="product-remove">Xóa</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <!-- tr -->


                                            <?php foreach ($_SESSION['card'] as $product_id => $card):
                                                $slug = Helper::getSlug($card['name']);
                                                $url = "chi-tiet-san-pham/$slug/$product_id/" . $card['id_hsx'];
                                                ?>
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <div class="pro-thumbnail-img">
                                                            <img width="100px" height="111px"
                                                                 src="../backend/assets/uploads/<?php echo $card['avatar'] ?>"
                                                                 alt="">
                                                        </div>
                                                        <div class="pro-thumbnail-info text-left">
                                                            <h6 class="product-title-2">
                                                                <a href="<?php echo $url ?>"><?php echo $card['name'] ?></a>
                                                            </h6>
                                                            <p>Thương hiệu:<?php echo $card['hsx'] ?> </p>
                                                        </div>
                                                    </td>
                                                    <td class="product-price"><?php echo number_format($card['price']) ?></td>
                                                    <td class="">
                                                        <div>
                                                            <input style="width: 60px" type="number" min="0"
                                                                   value="<?php echo $card['quality'] ?>"
                                                                   name="<?php echo $product_id ?>"
                                                                   class="form-control">
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        <?php
                                                        $total_price = $card['quality'] * $card['price'];
                                                        $total += $total_price;
                                                        echo number_format($total_price);
                                                        ?>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="xoa-san-pham/<?php echo $product_id?>"><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>

                                        <?php else: ?>
                                            <h2>Giỏ hàng trống</h2>

                                            <!-- tr -->
                                            </tbody>
                                            </table>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="payment-details box-shadow p-30 mb-50">
                                                <h6 class="widget-title border-left mb-20">Chi Tiết Thanh Toán</h6>
                                                <table>
                                                    <tr>
                                                        <td class="order-total">Tổng :</td>
                                                        <td class="order-total-price"><?php echo number_format($total) ?>
                                                            VNĐ
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="product-payment">
                                                            <input type="submit" name="submit" value="Cập nhật lại giá"
                                                                   class="btn btn-primary">
                                                            <a href="thanh-toan" class="btn btn-success">Đến trang thanh
                                                                toán</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- shopping-cart end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->

</section>
