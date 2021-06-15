<section class="content">
    <h2>Thêm mới Ổ cứng</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class=" col-lg-6">
            <label>Tên :</label>
            <input type="text" name="name"  value="<?php echo isset($_POST['themmoi'])?$_POST['name']:''?>"
                   class="form-control" placeholder="Tên Ram"/>
        </div>
        <div class=" col-lg-6">
            <label>Dung lượng:</label>
            <input type="number" name="memory"  value="<?php echo isset($_POST['themmoi'])?$_POST['memory']:''?>"
                   class="form-control" placeholder="Dung Lượng"/>
        </div>
        <div class="col-lg-6">
            <label>Bus Ram :</label>
            <input type="number" name="bus"  value="<?php echo isset($_POST['themmoi'])?$_POST['bus']:''?>"
                   class="form-control" placeholder="Mhz"/>
        </div>
        <div class="col-lg-6">
            <label>Giá :</label>
            <input type="number" name="gia"  value="<?php echo isset($_POST['themmoi'])?$_POST['gia']:''?>"
                   class="form-control" placeholder="VNĐ"/>
        </div>
        <div class="col-lg-6">
            <label>Số Lương :</label>
            <input type="number" name="soluong"  value="<?php echo isset($_POST['themmoi'])?$_POST['soluong']:''?>"
                   class="form-control" placeholder="Chiếc"/>
        </div>
        <div class="col-lg-6" >
            <label>
                Upload ảnh
            </label>
            <input  type="file" name="anh" class="form-control">
        </div>
        <div class="col-lg-12" style="text-align: center;margin-top: 10px" >
            <button type="submit" name="themmoi" class="btn btn-primary">Thêm Mới</button>
            <button name="Trolai" class="btn btn-primary"><a style="color: white" href="index.php?controller=maytinh&action=index">Trở Lại</a></button>
        </div>
    </form>
</section>
