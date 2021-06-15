<!-- START SLIDER AREA -->
<div class="slider-area  plr-185  mb-80">
    <div class="container-fluid">
        <div class="slider-content">
            <div class="row">
                <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                    <?php foreach ($products as $product):
                        $product_name=$product['name_computer'];
                        $product_slug=Helper::getSlug($product_name);
                        $product_id=$product['id_computer'];
                        $product_id_hang=$product['id_manufacturer'];
                        $product_link="chi-tiet-san-pham/$product_slug/$product_id/$product_id_hang";
                        ?>
                    <!-- layer-1 Start -->
                    <div class="col-md-12">
                        <div class=" llayer-1">
                            <div class="col-lg-4 slider-img" align="center">
                                <img src="../backend/assets/uploads/<?php echo $product['picture']?>" style="width: auto" alt="">
                            </div>
                            <div class="col-lg-8 slider-info">
                                <div class="slider-info-inner">
                                    <h6 class="slider-title-1 text-black-1"><?php echo $product['name_computer']?></h6>
                                    <a href="<?php echo $product_link?>" class="button extra-small btn-primary">
                                        <span class="text-uppercase">Mua Ngay</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- layer-1 end -->
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SLIDER AREA -->
