<section class="content">
    <h2>Thêm mới Ổ cứng</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class=" col-lg-6">
            <label>Tên :</label>
            <input type="text" name="name"  value="<?php echo isset($_POST['themmoi'])?$_POST['name']:''?>"
                   class="form-control" placeholder="Tên Danh Mục"/>
        </div>
        <div class=" col-lg-6">
            <label >Mô Tả:</label>
            <input type="text" name="description"  value="<?php echo isset($_POST['themmoi'])?$_POST['description']:''?>"
                   class="form-control" placeholder="Mô tả"/>
        </div>
        <div class="col-lg-12" style="text-align: center;margin-top: 10px" >
            <button type="submit" name="themmoi" class="btn btn-primary">Thêm Mới</button>
            <button name="Trolai" class="btn btn-primary"><a style="color: white" href="index.php?controller=category&action=index">Trở Lại</a></button>
        </div>
    </form>
</section>

