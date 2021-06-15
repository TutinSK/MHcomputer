<?php
require_once 'models/Hsx.php';
require_once 'controllers/Controller.php';
class HsxController extends Controller{
    public function index(){
        $hsx_model=new Hsx();
        $hsxs=$hsx_model->getAll();
        $page=$hsx_model->getPagination('manufacturer');
        $this->content=$this->render('views/hsxs/index.php',['hsxs'=>$hsxs,'page'=>$page]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        $hsx_model=new Hsx();
        if(isset($_POST['themmoi'])){
            $name=$_POST['name'];
            $arrpicture = $_FILES['anh'];
            if(empty($name)){
                $this->error="Tên không để trống";
            }
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {
                $extension = pathinfo($arrpicture['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $this->error = "Cần upload định dạng ảnh";
                    $isError = 1;

                } else if ($arrpicture['size'] > 2 * 1024 * 1024) {
                    $this->error= "Dung lượng ảnh tối đa có thể upload là 2Mb";
                }
            }
            $avatar = '';
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {
                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'hsx-' . time() . $arrpicture['name'];
                $isUpload = move_uploaded_file($arrpicture['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar = $fileName;
                }
            }
            if(empty($this->error)){
                $hsx_model->name_manufacturer=$name;
                $hsx_model->avatar=$avatar;
                $is_insert=$hsx_model->create();
                if(!$is_insert){
                    $_SESSION['error']="Thêm thất bại";
                }else{
                    $_SESSION['success']="Thêm thành công";
                    header("Location:index.php?controller=hsx&action=index");
                    exit();
                }
            }
        }
        $this->content=$this->render('views/hsxs/create.php');
        require_once 'views/layouts/main.php';
    }
    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=hsx&action=index');
            exit();
        }
        $id = $_GET['id'];
        $hsx_model=new Hsx();
        $hsx=$hsx_model->getOne($id);
        if(isset($_POST['update'])){
            $name=$_POST['name'];
            $arrpicture = $_FILES['anh'];
            if(empty($name)){
                $this->error="Tên không được trống";
            }
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {
                $extension = pathinfo($arrpicture['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                        $this->error="Cần upload dạng ảnh";
                } else if ($arrpicture['size'] > 2 * 1024 * 1024) {
                    $this->error="Cần upload ảnh nhỏ hơn 2mb";
                }
            }
            $avatar = $hsx['avatar'];
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {

                $dirUpload = '/uploads';
                //khai báo thư mục có tên uploads, nằm trong thư mục
//                assets, dùng để chứa các file được upload lên
                $absolutePathUpload = __DIR__ . '/../assets' . $dirUpload;
                //thực hiện xóa ảnh cũ đi
                if (!empty($avatar)) {
                    @unlink($absolutePathUpload . '/' . $avatar);
                }

                if (!file_exists($absolutePathUpload)) {
                    mkdir($absolutePathUpload);
                }
                //sửa lại tên file để đảm bảo tính duy nhất
//                cho từng file đc upload
                $fileName = 'hsx-' . time() . $arrpicture['name'];
                $isUpload = move_uploaded_file($arrpicture['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar = $fileName;
                }
            }
            if(empty($this->error)){
                $hsx_model->name_manufacturer=$name;
                $hsx_model->avatar=$avatar;
                $is_update=$hsx_model->update($id);
                if(!$is_update){
                    $_SESSION['error']="Update bản ghi $id thất bại";
                }else{
                    $_SESSION['success']="Update bản ghi $id thành công";
                    header("Location:index.php?controller=hsx&action=index");
                    exit();
                }
            }
        }
        $this->content=$this->render('views/hsxs/update.php',['hsx'=>$hsx]);
        require_once 'views/layouts/main.php';
    }
    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=hsx&action=index');
            exit();
        }
        $id = $_GET['id'];
        $hsx_model=new Hsx();
        $is_delete=$hsx_model->delete($id);
        if(!$is_delete){
            $_SESSION['error']="Xóa bản ghi $id thất bại";
        }else{
            $_SESSION['success']="Xóa bản ghi $id thành công";
            header('Location:index.php?controller=hsx&action=index');
            exit();
        }
    }
}
