<?php

require_once 'models/Ocung.php';
require_once "controllers/Controller.php";
class OcungController extends Controller{
    public function index(){
        $ocung_models=new Ocung();
        $divers=$ocung_models->getAll();
        $categories=$ocung_models->getHard();
        $page=$ocung_models->getPagination('harddrive');
        $this->content=$this->render('views/ocungs/index.php',['drives'=>$divers,'page'=>$page,'categories'=>$categories]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        $ocung_models=new Ocung();
        $categories=$ocung_models->getHard();
        if(isset($_POST['themmoi'])){
            $name=$_POST['name'];
            $category_harddrive=$_POST['loaiocung'];
            $capacity=$_POST['dungluong'];
            $price=$_POST['gia'];
            $amount=$_POST['soluong'];
            $arrpicture=$_FILES['anh'];

            if(empty($name)||empty($capacity)||empty($price)||empty($amount)){
                $_SESSION['error']="Hãy Nhập Đủ Thông Tin";
                $this->content=$this->render('views/ocungs/create.php',['categories'=>$categories]);
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
                    $this->content = $this->render('views/ocungs/create.php');
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content = $this->render('views/ocungs/create.php');
                    require_once "views/layouts/main.php";
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
                    $fileName = 'harddrive-' . time() . $arrpicture['name'];
                    $isUpload = move_uploaded_file($arrpicture['tmp_name'],
                        $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                    if ($isUpload) {
                        $avatar = $fileName;
                    }
                }

                $ocung_models->name=$name;
                $ocung_models->category_harddrive=$category_harddrive;
                $ocung_models->capacity=$capacity;
                $ocung_models->price=$price;
                $ocung_models->picture=$avatar;
                $ocung_models->amount=$amount;
                $is_created=$ocung_models->create();
//                echo "<pre>";
//                print_r( $ocung_models->name);echo "<br/>";
//                print_r($ocung_models->category_harddrive);echo "<br/>";
//                print_r( $ocung_models->capacity);echo "<br/>";
//                print_r($ocung_models->price);echo "<br/>";
//                print_r( $ocung_models->picture);echo "<br/>";
//                 var_dump($is_created);
//                echo "</pre>";
//
//                die();


                if(!$is_created){
                    $_SESSION['error']="Thêm thất bại";
                    $this->content=$this->render('views/ocungs/create.php',['categories'=>$categories]);
                    require_once 'views/layouts/main.php';
                }else{
                    $_SESSION['success']='Thêm thành công';
                    header("Location:index.php?controller=ocung&action=index");
                    exit();
                }
            }
        $this->content=$this->render('views/ocungs/create.php',['categories'=>$categories]);
        require_once 'views/layouts/main.php';
    }
    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=ocung&action=index');
            exit();
        }
        $id = $_GET['id'];
        $ocung_models=new Ocung();
        $drive=$ocung_models->getOne($id);
        $categories=$ocung_models->getHard();
        if(isset($_POST['update'])){
            $name=$_POST['name'];
            $category_harddrive=$_POST['loaiocung'];
            $capacity=$_POST['dungluong'];
            $price=$_POST['gia'];
            $amount=$_POST['soluong'];
            $arrpicture=$_FILES['anh'];
            if(empty($name)||empty($capacity)||empty($price)){
                $_SESSION['error']="Hãy Nhập Đủ Thông Tin";
                $this->content=$this->render('views/ocungs/update.php',['categories'=>$categories]);
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
                    $this->content=$this->render('views/ocungs/update.php',['categories'=>$categories]);
                    require_once "views/layouts/main.php";
                    return;
                } else if ($arrpicture['size'] > 2 * 1024 * 1024) {
                    $_SESSION['error'] = "Dung lượng ảnh tối đa có thể upload là 2Mb";
                    $this->content=$this->render('views/ocungs/update.php',['categories'=>$categories]);
                    require_once "views/layouts/main.php";
                    return;
                }
            }
            $avatar = $drive['picture'];
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
                $fileName = 'computer-' . time() . $arrpicture['name'];
                $isUpload = move_uploaded_file($arrpicture['tmp_name'],
                    $absolutePathUpload . '/' . $fileName);
//                nếu upload thành công thì mới lưu tên ảnh vào trường avatar
                if ($isUpload) {
                    $avatar = $fileName;
                }
            }
            $ocung_models->name=$name;
            $ocung_models->category_harddrive=$category_harddrive;
            $ocung_models->capacity=$capacity;
            $ocung_models->price=$price;
            $ocung_models->amount=$amount;
            $ocung_models->picture=$avatar;
//            echo "<pre>";
//            print_r($ocung_models->category_harddrive);
//            echo "</pre>";
//            die();
//                            echo "<pre>";
//                print_r( $ocung_models->name);echo "<br/>";
//                print_r($ocung_models->category_harddrive);echo "<br/>";
//                print_r( $ocung_models->capacity);echo "<br/>";
//                print_r($ocung_models->price);echo "<br/>";
//                print_r( $ocung_models->picture);echo "<br/>";
//                echo "</pre>";
//
//                die();
            $is_update=$ocung_models->update($id);
            if(!$is_update){
                $_SESSION['error']="Update bản ghi $id thất bại";
                $this->content=$this->render('views/ocungs/update.php',['categories'=>$categories]);
                require_once 'views/layouts/main.php';
            }else{
                $_SESSION['success']="Update bản ghi $id thành công";
                header("Location:index.php?controller=ocung&action=index");
                exit();
            }
        }
        $this->content=$this->render('views/ocungs/update.php',['drive'=>$drive,'categories'=>$categories]);
        require_once 'views/layouts/main.php';
    }
    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=ocung&action=index');
            exit();
        }
        $id = $_GET['id'];
        $ocung_models = new Ocung();
        $is_delete = $ocung_models->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = "Xóa ban ghi $id thành công";
        } else {
            $_SESSION['error'] = "Xóa bản ghi thất bại";
        }
        header("Location:index.php?controller=ocung&action=index");
        exit();
    }
    public function view(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=ocung&action=index');
            exit();
        }
        $id = $_GET['id'];
        $ocung_models = new Ocung();
        $drive = $ocung_models->getOne($id);
        $this->content = $this->render('views/ocungs/view.php', ['drive' => $drive]);
        require_once 'views/layouts/main.php';
    }
}
