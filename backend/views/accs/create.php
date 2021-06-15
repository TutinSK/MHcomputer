<section class="content">
    <h2>Thêm mới Ổ cứng</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class=" col-lg-6">
            <label>Username :</label>
            <input type="text" name="username"  value="<?php echo isset($_POST['themmoi'])?$_POST['username']:''?>"
                   class="form-control" placeholder="Nhập Username"/>
        </div>
        <div class=" col-lg-6">
            <label>Password :</label>
            <input type="password" name="password"  value="<?php echo isset($_POST['themmoi'])?$_POST['password']:''?>"
                   class="form-control" placeholder="Nhập Password"/>
        </div>
        <div class=" col-lg-6">
            <label>Quyền :</label>
            <select name="role" class="form-control">
                <?php foreach ($roles as $role):?>
                <option <?php echo (isset($_POST['themmoi']) && $role['id_role']==$_POST['role'])?"selected=\"selected\"":''?> value="<?php echo $role['id_role']?>"><?php echo $role['name_role']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-12" style="text-align: center;margin-top: 10px" >
            <button type="submit" name="themmoi" class="btn btn-primary">Thêm Mới</button>
            <button name="Trolai" class="btn btn-primary"><a style="color: white" href="index.php?controller=hsx&action=index">Trở Lại</a></button>
        </div>
    </form>
</section>
