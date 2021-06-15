<?php
require_once 'models/Acc.php';
require_once 'controllers/Controller.php';

class AccController extends Controller{
    public function index(){
        $user_model=new Acc();
        $users=$user_model->getAll();
        $page=$user_model->getPagination('username_tb');
        $this->content=$this->render('views/accs/index.php',['users'=>$users,'page'=>$page]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        $acc_model=new Acc();
        $roles=$acc_model->getRole();
        if(isset($_POST['themmoi'])){
            $id_role=$_POST['role'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            if(empty($username)||empty($password)){
                $this->error='Không để Username hoặc Password trống';
            }
            if(empty($this->error)){
                $acc_model->id_role=$id_role;
                $acc_model->username=$username;
                $acc_model->password=md5($password);
                $is_created=$acc_model->create();
                if(!$is_created){
                    $_SESSION['error']="Thêm thất bại";
                }else{
                    $_SESSION['success']="Thêm thành công";
                    header('Location:index.php?controller=acc&action=index');
                    exit();
                }
            }
        }
        $this->content=$this->render('views/accs/create.php',['roles'=>$roles]);
        require_once 'views/layouts/main.php';
    }
    public function update(){
        if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location:index.php?controller=acc&action=index');
            exit();
        }
        $id=$_GET['id'];
        $acc_model=new Acc();
        $user=$acc_model->getOne($id);
        $roles=$acc_model->getRole();
        if(isset($_POST['update'])){
            $id_role=$_POST['role'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            if(empty($username)||empty($password)){
                $this->error='Không để Username hoặc Password trống';
            }
            $user_update=$acc_model->getUser($username);
//            if(!empty($user_update)){
//                $this->error="Username Đã tồn tại";
//            }
            if(empty($this->error)){
                $acc_model->id_role=$id_role;
                $acc_model->username=$username;
                $acc_model->password=md5($password);
                $is_update=$acc_model->update($id);
                if(!$is_update){
                    $_SESSION['error']="Update bản ghi $id thất bại";
                }else{
                    $_SESSION['success']="Update bản ghi $id thành công";
                }
                header('Location:index.php?controller=acc&action=index');
                exit();
            }
        }
        $this->content=$this->render('views/accs/update.php',['user'=>$user,'roles'=>$roles]);
        require_once 'views/layouts/main.php';
    }
    public function delete(){
        if(!isset($_GET['id'])||!is_numeric($_GET['id'])){
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location:index.php?controller=acc&action=index');
            exit();
        }
        $id=$_GET['id'];
        $acc_model=new Acc();
        $is_delete=$acc_model->delete($id);
        if(!$is_delete){
            $_SESSION['error']="Xóa bản ghi $id thất bại";
        }else{
            $_SESSION['success']="Xóa bản ghi $id thành công";
        }
        header('Location:index.php?controller=acc&action=index');
        exit();
    }

}
