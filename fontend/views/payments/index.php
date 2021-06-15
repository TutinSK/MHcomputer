<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80">
    <div class="breadcrumbs overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumbs-inner">
                        <h1 class="breadcrumbs-title">Thanh Toán</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="trang-chu">Trang Chủ</a></li>
                            <li>Thanh Toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- checkout start -->
                        <div class="tab-pane active" id="checkout">
                            <div class="checkout-content box-shadow p-30">
                                <form action="" method="POST">
                                    <div class="row">
                                        <!-- billing details -->
                                        <div class="col-md-6">
                                            <div class="billing-details pr-10">
                                                <style>
                                                    input,textarea{
                                                        border: 1px solid red !important;
                                                        border-radius: 5px !important;
                                                    }
                                                </style>
                                                <h6 class="widget-title border-left mb-20">Thông Tin Khách Hàng</h6>
                                                <input name="name" type="text" value=""  placeholder="Họ tên Đầy Đủ...">
                                                <input name="email" type="text" value=""  placeholder="Email...">
                                                <input name="phone" type="text" value=""  placeholder="Số Điện Thoại...">
                                                <textarea name="address" class="custom-textarea" placeholder="Địa Chỉ Của Bạn..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- our order -->
                                            <div class="payment-details pl-10 mb-50">
                                                <h6 class="widget-title border-left mb-20">Giỏ hàng của bạn</h6>
                                                <table>
                                                    <?php $total_price=0?>
                                                    <?php foreach ($_SESSION['card'] as $product_id=>$card):?>
                                                    <tr>
                                                        <td class="td-title-1"><?php echo $card['name']?> x <?php echo $card['quality']?></td>
                                                        <td class="td-title-2">
                                                            <?php
                                                                $price_total=$card['price']*$card['quality'];
                                                                $total_price+=$price_total;
                                                                echo number_format($price_total);
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <tr>
                                                        <td class="order-total">Tổng Tiền</td>
                                                        <td class="order-total-price"><?php echo number_format($total_price)?> VNĐ</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- payment-method -->
                                            <div class="payment-method">
                                                <h6 class="widget-title border-left mb-20">Chọn phương thức thanh toán</h6>
                                                <div class="form-group">
                                                    <input type="radio" name="method" value="0" /> Thanh toán trực tuyến <br />
                                                    <input type="radio" name="method" checked value="1" /> COD (dựa vào địa chỉ của bạn) <br />
                                                </div>
                                            </div>
                                            <!-- payment-method end -->
                                            <input type="submit" name="submit" class="submit-btn-1 mt-30 btn-hover-1" value="Thanh Toán">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- checkout end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->

</section>
<!-- End page content -->
