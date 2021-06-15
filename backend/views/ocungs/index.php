<section class="content">
    <div class="col-md-12">
        <div class="col-md-1" style="margin-top: 10px;margin-bottom: 20px">
            <div class="col-md-12">
                <a class="btn btn-primary"
                   href="index.php?controller=ocung&action=create">
                    <i class="fas fa-plus"></i>
                    Thêm mới
                </a>
            </div>
        </div>
        <!-- Search form -->
        <div class="col-md-11" style="margin-top: 10px;margin-bottom: 20px">
            <form action="" method="get">
                <div hidden>
                    <input  name="controller" value="ocung" >
                    <input  name="action" value="index">
                </div>
                <div class="col-md-3">
                    <select name="loaiocung" class="form-control" style="border-radius:10px">
                        <option value="0">--Chọn Loại Ổ cứng--</option>
                        <?php foreach ($categories as $category):?>
                            <option  <?php echo (isset($_GET['timkiem'])&& $_GET['loaiocung']==$category['id'])?"selected=\"selected\"":""?> class="form-control" value="<?php echo $category['id']?>"><?php echo $category['name_category_disk']?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="col-md-3">
                    <input class="form-control" value="<?php echo isset($_GET['timkiem'])?$_GET['dungluong']:""?>" type="text" placeholder="Dung lượng" name="dungluong" aria-label="Search" style="border-radius:10px">
                </div>
                <div class="col-md-3"><input class="form-control" value="<?php echo isset($_GET['timkiem'])?$_GET['tenocung']:""?>" type="text" placeholder="Tên" name="tenocung" aria-label="Search" style="border-radius:10px"></div>
                <div class="col-md-3 pull-right" ><button name="timkiem" class="btn btn-primary" type="submit">Tìm kiếm<i class="fas fa-search"></i></button></div>

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
            <th>Loại ổ cứng</th>
            <th>Giá</th>
            <th>Dung lượng</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Ngày tạo</th>
            <th>Action</th>
        </tr>
        <?php if(empty($drives)):?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        <?php else:?>
            <?php foreach ($drives as $drive):?>
                <tr>
                    <td><?php echo $drive['id_harddrive']?></td>
                    <td ><p><?php echo $drive['name_category']?></p></td>
                    <td style="text-align: left"  class="test"><p><?php echo $drive['name']?></p></td>
                    <td><?php echo $drive['name_category_disk']?></td>
                    <td><?php echo number_format($drive['price'])?> VNĐ</td>
                    <td><?php echo ($drive['price'])?> GB</td>
                    <td><img style="width: 80px;height: 80px" src="assets/uploads/<?php echo $drive['picture']?>"></td>
                    <td><?php echo ($drive['amount'])?> Chiếc</td>
                    <td><?php echo $drive['created_at']?></td>
                    <?php
                    $link_view='index.php?controller=ocung&action=view&id='.$drive['id_harddrive'];
                    $link_update='index.php?controller=ocung&action=update&id='.$drive['id_harddrive'];
                    $link_delete='index.php?controller=ocung&action=delete&id='.$drive['id_harddrive'];
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
