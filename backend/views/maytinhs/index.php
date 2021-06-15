<section class="content">
    <div class="col-md-12">
    <div class="col-md-1" style="margin-top: 10px;margin-bottom: 20px">
        <div class="col-md-12">
        <a class="btn btn-primary"
           href="index.php?controller=maytinh&action=create">
            <i class="fas fa-plus"></i>
            Thêm mới
        </a>
        </div>
    </div>
    <!-- Search form -->
    <div class="col-md-11" style="margin-top: 10px;margin-bottom: 20px">
        <form action="" method="get">
        <div class="col-md-3">
            <select name="loai" class="form-control" style="border-radius:10px">
                <option value="0">--Chọn Loại máy tính--</option>
            <?php foreach ($categories as $category):?>
                <option  <?php echo (isset($_GET['seach'])&& $_GET['loai']==$category['id_category'])?"selected=\"selected\"":""?> class="form-control" value="<?php echo $category['id_category']?>"><?php echo $category['name_category']?></option>
            <?php endforeach;?>
            </select>
        </div>
        <div class="col-md-3">
            <select name="hang" class="form-control" style="border-radius:10px">
                <option value="0">--Chọn hãng--</option>
                <?php foreach ($hangs as $hang):?>
                    <option  <?php echo (isset($_GET['seach'])&& $_GET['hang']==$hang['id_manufacturer'])?"selected=\"selected\"":""?> class="form-control" value="<?php echo $hang['id_manufacturer']?>"><?php echo $hang['name_manufacturer']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-md-3"><input class="form-control" value="<?php echo isset($_GET['seach'])?$_GET['name']:""?>" type="text" placeholder="Tìm Kiếm" name="name" aria-label="Search" style="border-radius:10px"></div>
        <div class="col-md-3 pull-right" ><button name="seach" class="btn btn-primary" type="submit">Tìm kiếm<i class="fas fa-search"></i>

            </a></button></div>
        </form>
    </div>
    </div>
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
        <th>Tên</th>
        <th>Loại Máy</th>
        <th>Hãng</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Số Lượng</th>
        <th>Ngày tạo</th>
        <th>Action</th>
    </tr>
    <?php if(empty($maytinhs)):?>
        <tr>
            <td colspan="5">No Data</td>
        </tr>
    <?php else:?>
        <?php foreach ($maytinhs as $maytinh):?>
            <tr>
                <td><?php echo $maytinh['id_computer']?></td>
                <td style="text-align: left"  class="test"><p><?php echo $maytinh['name_computer']?></p></td>
                <td><?php echo $maytinh['name_category']?></td>
                <td><?php echo $maytinh['name_manufacturer']?></td>
                <td><?php echo number_format($maytinh['price'])?></td>
                <td><img style="width: 80px;height: 80px" src="assets/uploads/<?php echo $maytinh['picture']?>"></td>
                <td><?php echo $maytinh['amount']?></td>
                <td><?php echo $maytinh['created_at']?></td>
                <?php
                $link_view='index.php?controller=maytinh&action=view&id='.$maytinh['id_computer'];
                $link_update='index.php?controller=maytinh&action=update&id='.$maytinh['id_computer'];
                $link_delete='index.php?controller=maytinh&action=delete&id='.$maytinh['id_computer'];
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
<!-- /.content -->
