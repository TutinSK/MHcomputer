<?php
//echo "<pre>";
//print_r($maytinh);
//echo "</pre>";
?>
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
                                            <img src="assets/uploads/<?php echo $maytinh['picture']?>"
                                                 style="max-height: 240px;"></div>
                                        <div class="col-md-5" id="card-0" style="margin: auto; width: 320px; height: 240px;">
                                            <img src="assets/uploads/<?php echo $maytinh['picture1']?>"
                                                 style="max-height: 240px;"></div>
                                        <div class="col-md-7" id="card-0" style="margin: auto; width: 320px; height: 240px;">
                                            <img src="assets/uploads/<?php echo $maytinh['picture2']?>"
                                                 style="max-height: 240px;"></div>
                                        <div class="col-md-5" id="card-0" style="margin: auto; width: 320px; height: 240px;">
                                            <img src="assets/uploads/<?php echo $maytinh['picture3']?>"
                                                 style="max-height: 240px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5" style="padding-right: 0px;">
                            <div class="card" style="height: 331px;">
                                <div class="card-header text-center"><strong class="text-primary"><?php echo $maytinh['name_computer']?></strong></div>
                                <div class="card-body">
                                    <div class="col-sm-12 bg-light"><label><b>Gi?? : </b><?php echo number_format($maytinh['price'])?>&nbsp;VN??</label>
                                    </div>

                                    </div>
                                    <div class="col-sm-12 bg-light"><label><b>S??? L?????ng Trong Kho:</b> <?php echo $maytinh['amount']?> Chi???c</label>
                                    </div>
                                    <div class="col-sm-12"><label><b>L?????t View:</b>
                                            <?php echo $maytinh['view']?></label></div>
                                <div class="col-sm-12"><label><b>H??ng s???n xu???t:</b> <?php echo $maytinh['name_manufacturer']?></label>
                                    </div>
                                <div class="col-sm-12 card-header text-center text-danger"><h3>------------Th??ng S??? K?? Thu???t--------------</h3></div>
                                <div class="col-sm-12 w-100 bg-custom"><label><b>CPU : &nbsp;</b> <?php echo $maytinh['cpu']?></label></div>
                                <div class="col-sm-12 w-100"><label><b>RAM : &nbsp;</b> <?php echo $maytinh['ram']?> GB</label></div>
                                <div class="col-sm-12 w-100 bg-custom"><label><b>??? C???ng : <?php echo $maytinh['memory']?> GB</label></div>
                                <div class="col-sm-12 w-100"><label><b>M??n H??nh : &nbsp;</b> <?php echo $maytinh['screem']?></label></div>
                                <div class="col-sm-12 w-100 bg-custom"><label><b>Card M??n H??nh : &nbsp;</b> <?php echo $maytinh['card']?> </label></div>
                                <div class="col-sm-12 w-100"><label><b>C???ng k???t n???i: : &nbsp;</b> <?php echo $maytinh['port']?></label></div>
                                <div class="col-sm-12 w-100 bg-custom"><label><b>H??? ??i???u H??nh : &nbsp;</b> <?php echo $maytinh['opsystem']?></label></div>
                                <div class="col-sm-12 w-100"><label><b>M??u S???c : &nbsp;</b> <?php echo $maytinh['color']?></label></div>
                                <div class="col-sm-12 w-100"><label><b>Webcam : &nbsp;</b> <?php echo $maytinh['webcam']?></label></div>
                                <div class="col-sm-12 w-100 bg-custom"><label><b>Kh???i l?????ng : &nbsp;</b> <?php echo $maytinh['weight']?> Kg</label></div>
                                <div class="col-sm-12 w-100 bg-custom"><label><b>Pin : &nbsp;</b> <?php echo $maytinh['pin']?> Kg</label>
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



