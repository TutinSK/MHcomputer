<div class="col-md-12 wh-17-83" style=" margin-top:20px;font-family: sans-serif; font-size: 15px;">
    <div class="card" style="background: rgb(241, 242, 247);">
        <div class="card-body">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-sm-12 mt-20">
                                        <div class="col-md-7" id="card-0" style="margin: auto; width: 320px; height: 240px;">
                                            <img src="assets/uploads/<?php echo $drive['picture']?>"
                                                 style="max-height: 240px;"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5" style="padding-right: 0px;">
                            <div class="card" style="height: 331px;">
                                <div class="card-header text-center"><strong class="text-primary"><?php echo $drive['name']?></strong></div>
                                <div class="card-body">
                                    <div class="col-sm-12 w-100"><label><b>Loại ổ cứng : &nbsp;</b> <?php echo $drive['name_category_disk']?></label></div>
                                    <div class="col-sm-12 w-100"><label><b>Dung lượng : &nbsp;</b> <?php echo $drive['capacity']?> GB</label></div>
                                    <div class="col-sm-12 bg-light"><label><b>Giá : </b><?php echo number_format($drive['price'])?>&nbsp;VNĐ</label>
                                    </div>

                                </div>
                                <div class="col-sm-12 bg-light"><label><b>Số Lượng Trong Kho:</b> <?php echo $drive['amount']?> Chiếc</label>
                                </div>
                                <div class="col-sm-12"><label><b>Lượt View:</b>
                                        <?php echo $drive['views']?></label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                <div class="row">-->
                <!--                    <div class="col-sm-12" >-->
                <!--                        <div class="card" >-->
                <!--                           -->
                <!--                                    -->
                <!--                            <div class="card-body " >-->
                <!--                                <div class="col-sm-10 " style="padding-left: 35%">-->
                <!--                                   -->
                <!--                                    </div>-->
                <!---->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->

            </div>
        </div>
    </div>
</div>
