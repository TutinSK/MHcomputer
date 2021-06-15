<div class="col-md-12 wh-17-83" style=" margin-top:20px;font-family: sans-serif; font-size: 15px;">
    <div class="card" style="background: rgb(241, 242, 247);">
        <div class="card-body">
            <div id="bootstrap-data-table_wrapper"
                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12" style="padding-right: 0px;">
                            <div class="card" style="height: 331px;">
                                <div class="card-header text-center"><strong class="text-primary"><?php echo $category['name_category']?></strong></div>
                                <div class="card-body">
                                    <div class="col-sm-12 w-100"><label><b>Mô Tả : &nbsp;</b> <?php echo $category['description']?></label></div>
                                    <div class="col-sm-12 w-100"><label><b>Ngày tạo : &nbsp;</b> <?php echo date('d-m-y H:i:m',strtotime($category['created_at']))?></label></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>

