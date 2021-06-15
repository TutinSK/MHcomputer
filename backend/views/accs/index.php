<section class="content">
    <div class="col-md-12">
        <div class="col-md-1" style="margin-top: 10px;margin-bottom: 20px">
            <div class="col-md-12">
                <a class="btn btn-primary"
                   href="index.php?controller=acc&action=create">
                    <i class="fas fa-plus"></i>
                    Thêm mới
                </a>
            </div>
        </div>
        <!-- Search form -->
        <div class="col-md-11" style="margin-top: 10px;margin-bottom: 20px">
            <form action="" method="get">
                <div hidden>
                    <input style="visibility: hidden" name="controller" value="acc" >
                    <input style="visibility: hidden" name="action" value="index">
                </div>
                <div class="col-md-3">
                    <input class="form-control" value="<?php echo isset($_GET['seachuser'])?$_GET['username']:""?>" type="text"
                           placeholder="Username" name="username" style="border-radius:10px" >
                </div>
                <div class="col-md-3 pull-right" ><button name="seachuser" class="btn btn-primary" type="submit">Tìm kiếm<i class="fas fa-search"></i></button></div>
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
            <th>Quyền</th>
            <th>Username</th>
            <th>PassWord</th>
            <th>Ngày tạo</th>
            <th>Action</th>
        </tr>
        <?php if(empty($users)):?>
            <tr>
                <td colspan="5">No Data</td>
            </tr>
        <?php else:?>
            <?php foreach ($users as $user):?>
                <tr>
                    <td><?php echo $user['id_user']?></td>
                    <td ><p><?php echo $user['name_role']?></p></td>
                    <td style="text-align: left"  class="test"><p><?php echo $user['username']?></p></td>
                    <td><?php echo $user['password']?></td>
                    <td><?php echo date('d-m-Y H:i:m',strtotime($user['created_at']))?></td>
                    <?php
                    $link_update='index.php?controller=acc&action=update&id='.$user['id_user'];
                    $link_delete='index.php?controller=acc&action=delete&id='.$user['id_user'];
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

