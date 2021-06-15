<section class="content">
    <div class="col-md-12">
        <div class="col-md-1" style="margin-top: 10px;margin-bottom: 20px">
            <div class="col-md-12">
                <a class="btn btn-primary"
                   href="index.php?controller=ram&action=create">
                    <i class="fas fa-plus"></i>
                    Thêm mới
                </a>
            </div>
        </div>
        <!-- Search form -->
        <div class="col-md-11" style="margin-top: 10px;margin-bottom: 20px">
            <form action="" method="get">
                <div hidden>
                    <input style="visibility: hidden" name="controller" value="ram" >
                    <input style="visibility: hidden" name="action" value="index">
                </div>
                <div class="col-md-3">
                    <input class="form-control" value="<?php echo isset($_GET['seachram'])?$_GET['bus']:""?>" type="text"
                           placeholder="Bus ram" name="bus" aria-label="Search" style="border-radius:10px">
                </div>
                <div class="col-md-3">
                    <input class="form-control" value="<?php echo isset($_GET['seachram'])?$_GET['memory']:""?>" type="text" placeholder="Dung lượng" name="memory" aria-label="Search" style="border-radius:10px">
                </div>
                <div class="col-md-3"><input class="form-control" value="<?php echo isset($_GET['seachram'])?$_GET['tenram']:""?>" type="text" placeholder="Tên" name="tenram" aria-label="Search" style="border-radius:10px"></div>
                <div class="col-md-3 pull-right" ><button name="seachram" class="btn btn-primary" type="submit">Tìm kiếm<i class="fas fa-search"></i></button></div>
            </form>
        </div>
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
            <th>Loại</th>
            <th>Tên</th>
            <th>Dung Lượng</th>
            <th>Bus</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Ảnh</th>
            <th>Lượt Xem</th>
            <th>Ngày tạo</th>
            <th>Action</th>
        </tr>
        <?php if(empty($rams)):?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        <?php else:?>
            <?php foreach ($rams as $ram):?>
                <tr>
                    <td><?php echo $ram['id_ram']?></td>
                    <td ><p><?php echo $ram['name_category']?></p></td>
                    <td style="text-align: left"  class="test"><p><?php echo $ram['name_ram']?></p></td>
                    <td><?php echo $ram['memory']?> GB</td>
                    <td><?php echo($ram['bus'])?> Mhz</td>
                    <td><?php echo number_format($ram['price'])?> VNĐ</td>
                    <td><?php echo ($ram['amount'])?> Chiếc</td>
                    <td><img style="width: 80px;height: 80px" src="assets/uploads/<?php echo $ram['picture']?>"></td>
                    <td><?php echo ($ram['view'])?> lượt</td>
                    <td><?php echo $ram['created_at']?></td>
                    <?php
                    $link_view='index.php?controller=ram&action=view&id='.$ram['id_ram'];
                    $link_update='index.php?controller=ram&action=update&id='.$ram['id_ram'];
                    $link_delete='index.php?controller=ram&action=delete&id='.$ram['id_ram'];
                    ?>
                    <td>
                        <a  href="<?php echo $link_view?>" ><i class="fa fa-eye"></i></a>
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
