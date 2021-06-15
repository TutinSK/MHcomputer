<section class="content">
    <div class="col-md-12">
        <!-- Search form -->
    </div>
    <br/>
    <br/>
    <style>
        td,th{
            /*border-top: 1px #1e282c solid !important;*/
            /*text-align: center;*/
        }
        i{
            margin-left: 5px;
        }
        .test p{
            overflow: hidden;
            text-overflow: ellipsis;
            width: 200px;
            -webkit-line-clamp: 1;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
    </style>
    <table class="table table-striped table-hover" style="margin-top: 20px">
        <tr class="danger">
            <th>ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
        </tr>
        <?php if(empty($oders)):?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        <?php else:?>
            <?php foreach ($oders as $oder):?>
                <tr>
                    <td><?php echo $oder['id_oder']?></td>
                    <td ><p><?php echo $oder['name_computer']?></p></td>
                    <td><?php echo number_format($oder['price'])?></td>
                    <td><?php echo $oder['quality']?></td>

                </tr>
            <?php endforeach;?>
        <?php endif;?>

    </table>
</section>


