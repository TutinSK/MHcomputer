<section class="content">
    <div class="col-md-12">
        <div class="col-md-1" style="margin-top: 10px;margin-bottom: 20px">
            <div class="col-md-12">
                <a class="btn btn-primary"
                   href="index.php?controller=category&action=create">
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
            <th>Tên Danh Mục</th>
            <th>Mô Tả</th>
            <th>Ngày tạo</th>
            <th>Action</th>
        </tr>
        <?php if(empty($categories)):?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        <?php else:?>
            <?php foreach ($categories as $category):?>
                <tr>
                    <td><?php echo $category['id_category']?></td>
                    <td ><p><?php echo $category['name_category']?></p></td>
                    <td ><p><?php echo $category['description']?></p></td>
                    <td><?php echo date('d-m-Y H:i:m',strtotime($category['created_at']))?></td>
                    <?php
                    $link_view='index.php?controller=category&action=view&id='.$category['id_category'];
                    $link_update='index.php?controller=category&action=update&id='.$category['id_category'];
                    $link_delete='index.php?controller=category&action=delete&id='.$category['id_category'];
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
