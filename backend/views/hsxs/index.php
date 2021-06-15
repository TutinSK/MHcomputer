<section class="content">
    <div class="col-md-12">
        <div class="col-md-1" style="margin-top: 10px;margin-bottom: 20px">
            <div class="col-md-12">
                <a class="btn btn-primary"
                   href="index.php?controller=hsx&action=create">
                    <i class="fas fa-plus"></i>
                    Thêm mới
                </a>
            </div>
        </div>
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
            <th>Tên Hãng</th>
            <th>Avatar</th>
            <th>Ngày tạo</th>
            <th>Action</th>
        </tr>
        <?php if(empty($hsxs)):?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        <?php else:?>
            <?php foreach ($hsxs as $hsx):?>
                <tr>
                    <td><?php echo $hsx['id_manufacturer']?></td>
                    <td ><p><?php echo $hsx['name_manufacturer']?></p></td>
                    <td ><img src="assets/uploads/<?php echo $hsx['avatar']?>" width="70px" height="70px"></td>
                    <td><?php echo date('d-m-Y H:i:m',strtotime($hsx['created_at']))?></td>
                    <?php
                    $link_update='index.php?controller=hsx&action=update&id='.$hsx['id_manufacturer'];
                    $link_delete='index.php?controller=hsx&action=delete&id='.$hsx['id_manufacturer'];
                    ?>
                    <td>
                        <a href="<?php echo $link_update?>"><i class="fas fa-pencil-alt"></i></a>
                        <a href="<?php echo $link_delete?>" onclick="return confirm('Bạn có muốn xóa')"><i class="fa fa-trash"></i></a>
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

