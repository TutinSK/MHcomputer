<section class="content">
    <h2>Thêm mới Máy Tính</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class=" col-lg-6">
            <label>Tên :</label>
            <input type="text" name="name"  value="<?php echo isset($_POST['update'])?$_POST['name']:$maytinh['name_computer']?>"
                   class="form-control" placeholder="Tên máy tính"/>
        </div>

        <div class=" col-lg-6">
            <label>Loại:</label>
            <select class="form-control" name="loai">
                <?php foreach ($categories as $category):?>
                    <option  <?php echo ($category['id_category']==$maytinh['id_category'])?"selected=\"selected\"":''?> value="<?php echo $category['id_category']?>"><?php echo $category['name_category']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class=" col-lg-6">
            <label>Hãng Sản Xuất</label>

            <select class="form-control" name="hang">
                <?php foreach ($manufacturers as $manufacturer):?>
                    <option  <?php echo ($manufacturer['id_manufacturer']==$maytinh['id_manufacturer'])?"selected=\"selected\"":''?> value="<?php echo $manufacturer['id_manufacturer']?>"><?php echo $manufacturer['name_manufacturer']?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="col-lg-6">
            <label>Giá :</label>
            <input type="number" name="gia"  value="<?php echo isset($_POST['update'])?$_POST['gia']:$maytinh['price']?>"
                   class="form-control" placeholder="VNĐ"/>
        </div>
        <div class="col-lg-6">
            <label>CPU</label>
            <input type="text" name="cpu"  value="<?php echo isset($_POST['update'])?$_POST['cpu']:$maytinh['cpu']?>"
                   class="form-control" placeholder="Chip xử lý"/>
        </div>
        <div class="col-lg-6">
            <label>RAM</label>
            <input type="text" name="ram"  value="<?php echo isset($_POST['update'])?$_POST['ram']:$maytinh['ram']?>"
                   class="form-control" placeholder="Ram"/>
        </div>
        <div class="col-lg-6">
            <label>CARD</label>
            <input type="text" name="card"  value="<?php echo isset($_POST['update'])?$_POST['card']:$maytinh['card']?>"
                   class="form-control" placeholder="Card đồ họa"/>
        </div>
        <div class="col-lg-6">
            <label>Ổ Cứng</label>
            <input type="text" name="ocung"  value="<?php echo isset($_POST['update'])?$_POST['ocung']:$maytinh['memory']?>"
                   class="form-control" placeholder="Chi tiết ổ cứng"/>
        </div>
        <div class="col-lg-6">
            <label>Màn Hình</label>
            <input type="text" name="manhinh"  value="<?php echo isset($_POST['update'])?$_POST['manhinh']:$maytinh['screem']?>"
                   class="form-control" placeholder="Màn Hình"/>
        </div>
        <div class="col-lg-6">
            <label>Hệ Điều Hành</label>
            <input type="text" name="hdh"  value="<?php echo isset($_POST['update'])?$_POST['hdh']:$maytinh['opsystem']?>"
                   class="form-control" placeholder="Hệ điều hành"/>
        </div>
        <div class="col-lg-6">
            <label>Cổng Kết Nối</label>
            <input type="text" name="port"  value="<?php echo isset($_POST['update'])?$_POST['port']:$maytinh['port']?>"
                   class="form-control" placeholder="Cổng kết nối"/>
        </div>
        <div class="col-lg-6">
            <label>Camera</label>
            <input type="tel" name="webcam"  value="<?php echo isset($_POST['update'])?$_POST['webcam']:$maytinh['webcam']?>"
                   class="form-control" placeholder="Webcam"/>
        </div>
        <div class="col-lg-6">
            <label>Khối lượng</label>
            <input type="number" name="khoiluong"  value="<?php echo isset($_POST['update'])?$_POST['khoiluong']:$maytinh['weight']?>"
                   class="form-control" placeholder="Kg"/>
        </div>
        <div class="col-lg-6">
            <label>Màu Sắc</label>
            <input type="text" name="mausac"  value="<?php echo isset($_POST['update'])?$_POST['mausac']:$maytinh['color']?>"
                   class="form-control" placeholder="Màu"/>
        </div>
        <div class="col-lg-6">
            <label>Pin</label>
            <input type="text" name="pin"  value="<?php echo isset($_POST['update'])?$_POST['pin']:$maytinh['pin']?>"
                   class="form-control" placeholder="Pin"/>
        </div>
        <div class="col-lg-6">
            <label>Số lượng</label>
            <input type="number" name="soluong"  value="<?php echo isset($_POST['update'])?$_POST['soluong']:$maytinh['amount']?>"
                   class="form-control" placeholder="Số lượng"/>
        </div>

        <div class="form-group col-lg-12">
            <label>Mô Tả</label>
            <textarea class="form-control" name="mota" rows="3"><?php echo isset($_POST['update'])?$_POST['mota']:$maytinh['description']?></textarea>
        </div>
        <div class="col-lg-3" >
            <label>
                Upload ảnh
            </label>
            <input  type="file" name="anh" class="form-control">
        </div>
        <div class="col-lg-3" >
            <label>
                Upload ảnh
            </label>
            <input  type="file" name="anh1" class="form-control">
        </div>
        <div class="col-lg-3" >
            <label>
                Upload ảnh
            </label>
            <input  type="file" name="anh2" class="form-control">
        </div>
        <div class="col-lg-3" >
            <label>
                Upload ảnh
            </label>
            <input  type="file" name="anh3" class="form-control">
        </div>

        <div class="col-lg-12" style="text-align: center;margin-top: 10px" >
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <button name="Trolai" class="btn btn-primary"><a style="color: white" href="index.php?controller=maytinh&action=index">Trở Lại</a></button>
        </div>
    </form>
</section>
