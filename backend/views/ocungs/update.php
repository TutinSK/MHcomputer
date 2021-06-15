<section class="content">
    <h2>Thêm mới Ổ cứng</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class=" col-lg-6">
            <label>Tên :</label>
            <input type="text" name="name"  value="<?php echo isset($_POST['update'])?$_POST['name']:$drive['name']?>"
                   class="form-control" placeholder="Tên ổ cứng"/>
        </div>
        <div class=" col-lg-6">
            <label>Loại:</label>
            <select class="form-control" name="loaiocung">
                <?php foreach ($categories as $category):?>
                    <option  <?php echo (isset($_POST['update'])&&$category['id']==$_POST['loaiocung'])?"selected=\"selected\"":''?> value="<?php echo $category['id']?>"><?php echo $category['name_category_disk']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-6">
            <label>Dung Lượng :</label>
            <input type="text" name="dungluong"  value="<?php echo isset($_POST['update'])?$_POST['dungluong']:$drive['capacity']?>"
                   class="form-control" placeholder="GB"/>
        </div>
        <div class="col-lg-6">
            <label>Giá :</label>
            <input type="number" name="gia"  value="<?php echo isset($_POST['update'])?$_POST['gia']:$drive['price']?>"
                   class="form-control" placeholder="VNĐ"/>
        </div>
        <div class="col-lg-6">
            <label>Số Lương :</label>
            <input type="number" name="soluong"  value="<?php echo isset($_POST['themmoi'])?$_POST['soluong']:$drive['amount']?>"
                   class="form-control" placeholder="Chiếc"/>
        </div>
        <div class="col-lg-6" >
            <label>
                Upload ảnh
            </label>
            <input  type="file" name="anh" class="form-control">
        </div>
        <div class="col-lg-12" style="text-align: center;margin-top: 10px" >
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <button name="Trolai" class="btn btn-primary"><a style="color: white" href="index.php?controller=ocung&action=index">Trở Lại</a></button>
        </div>
    </form>
</section>
