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
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Tổng Tiền</th>
            <th>Ngày</th>
            <th>Action</th>
        </tr>
        <?php if(empty($oders)):?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        <?php else:?>
            <?php foreach ($oders as $oder):?>
                <tr>
                    <td><?php echo $oder['id_oder']?></td>
                    <td ><p><?php echo $oder['fullname']?></p></td>
                    <td style="text-align: left"  class="test"><p><?php echo $oder['phone']?></p></td>
                    <td><?php echo $oder['email']?></td>
                    <td><?php echo ($oder['address'])?></td>
                    <td><?php echo number_format($oder['total_price'])?></td>
                    <td><?php echo date('d-m-Y H:i:m',strtotime($oder['created_at']))?></td>
                    <?php
                    $link_view='index.php?controller=oder&action=view&id='.$oder['id_oder'];
                    ?>
                    <td>
                        <a  href="<?php echo $link_view?>" ><i class="fa fa-eye"></i></a>

                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>

    </table>
    <div class="col-md-6 div col-md-offset-3">
        <ul class="pagination">
            <?php echo $page?>
        </ul>
    </div>
</section>

