<?php
require_once 'models/Ram.php';
require_once 'controllers/Controller.php';
class RamController extends Controller{
    public function index(){
        $rammodels=new Ram();
        $rams=$rammodels->getAll();
        $page=$rammodels->getPagination('ram');
        $this->content=$this->render('views/rams/index.php',['rams'=>$rams,'page'=>$page]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        $rams_models=new Ram();
        if(isset($_POST['themmoi'])){
            $name=$_POST['name'];
            $memory=$_POST['memory'];
            $bus=$_POST['bus'];
            $price=$_POST['gia'];
            $amount=$_POST['soluong'];
            $arrpicture=$_FILES['anh'];
            if(empty($name)||empty($memory)||empty($bus)||empty($price)||empty($amount)){
                $_SESSION['error']='Hãy điền đủ thông tin';
            }
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {
                $extension = pathinfo($arrpicture['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $this->content=$this->render('views/rams/create.php');
                    require_once 'views/layouts/main.php';
                    return;

                } else if ($arrpicture['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content=$this->render('views/rams/create.php');
                    require_once 'views/layouts/main.php';
                    return;
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
                $fileName = 'ram-' . time() . $arrpicture['name'];
                $isUpload = move_uploaded_file($arrpicture['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar = $fileName;
                }
            }
                $rams_models->name_ram=$name;
                $rams_models->memory=$memory;
                $rams_models->bus=$bus;
                $rams_models->price=$price;
                $rams_models->amount=$amount;
                $rams_models->picture=$avatar;
                $is_innsert=$rams_models->insert();
                if(!$is_innsert){
                    $_SESSION['error']='Thêm thất bại';
                    $this->content=$this->render('views/rams/create.php');
                    require_once 'views/layouts/main.php';
                }else{
                    $_SESSION['success']="Thêm thành công";
                    header('Location:index.php?controller=ram&action=index');
                    exit();
                }


        }
        $this->content=$this->render('views/rams/create.php');
        require_once 'views/layouts/main.php';
    }
    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=ram&action=index');
            exit();
        }
        $id = $_GET['id'];
        $ram_models=new Ram();
        $ram=$ram_models->getOne($id);
        if(isset($_POST['update'])){
            $name=$_POST['name'];
            $memory=$_POST['memory'];
            $bus=$_POST['bus'];
            $price=$_POST['gia'];
            $amount=$_POST['soluong'];
            $arrpicture=$_FILES['anh'];
            if(empty($name)||empty($memory)||empty($bus)||empty($price)||empty($amount)){
                $_SESSION['error']='Hãy điền đủ thông tin';
                $this->content=$this->render('views/rams/update.php',['ram'=>$ram]);
                require_once 'views/layouts/main.php';
                return;
            }
            if ($arrpicture['size'] > 0 && $arrpicture['error'] == 0) {
                $extension = pathinfo($arrpicture['name'],
                    PATHINFO_EXTENSION);
                //xử lý trường hợp upload ko phải dạng ảnh
                if (!in_array($extension, ['jpg', 'gif', 'png', 'jpeg'])) {
                    $_SESSION['error'] = "Cần upload định dạng ảnh";
                    $isError = 1;
                    $this->content=$this->render('views/ram/update.php',['ram'=>$ram]);
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content=$this->render('views/ram/update.php',['ram'=>$ram]);
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            $avatar = $ram['picture'];
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
                $fileName = 'ram-' . time() . $arrpicture['name'];
                $isUpload = move_uploaded_file($arrpicture['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar = $fileName;
                }
            }
            $ram_models->name_ram=$name;
            $ram_models->memory=$memory;
            $ram_models->bus=$bus;
            $ram_models->price=$price;
            $ram_models->amount=$amount;
            $ram_models->picture=$avatar;
            $is_update=$ram_models->update($id);
            if(!$is_update){
                $_SESSION['error']="Update bản ghi $id thất bại";
                $this->content=$this->render('views/rams/update.php',['ram'=>$ram]);
                require_once 'views/layouts/main.php';
            }else{
                $_SESSION['success']="Update bản ghi $id thành công";
                header("Location:index.php?controller=ram&action=index");
                exit();
            }
        }
        $this->content=$this->render('views/rams/update.php',['ram'=>$ram]);
        require_once 'views/layouts/main.php';
    }
    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=ram&action=index');
            exit();
        }
        $id = $_GET['id'];
        $ram_model=new Ram();
        $is_delete=$ram_model->delete($id);
        if(!$is_delete){
            $_SESSION['error']="Xóa bản ghi $id thất bại";
        }
        else{
            $_SESSION['success']="Xóa bản ghi $id thành công";
        }
        header("Location:index.php?controller=ram&action=index");
        exit();
    }
    public function view(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=ram&action=index');
            exit();
        }
        $id = $_GET['id'];
        $ram_models=new Ram();
        $ram=$ram_models->getOne($id);
        $this->content=$this->render('views/rams/view.php',['ram'=>$ram]);
        require_once 'views/layouts/main.php';
    }

}