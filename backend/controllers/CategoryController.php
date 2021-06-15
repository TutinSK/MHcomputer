<?php
require_once 'models/Category.php';
require_once 'controllers/Controller.php';
class CategoryController extends Controller{
    public function index(){
        $category_model=new Category();
        $categories=$category_model->getAll();
        $page=$category_model->getPagination('categories');
        $arr_pagram=[
            'categories'=>$categories,
            'page'=>$page
        ];
        $this->content=$this->render('views/categories/index.php',$arr_pagram);
        require_once "views/layouts/main.php";
    }
    public function view(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=category&action=index');
            exit();
        }
        $id = $_GET['id'];
        $category_model=new Category();
        $category=$category_model->getOne($id);
        $this->content=$this->render('views/categories/view.php',['category'=>$category]);
        require_once 'views/layouts/main.php';
    }
    public function create(){
        $category_model=new Category();
        if(isset($_POST['themmoi'])){
            $name=$_POST['name'];
            $description=$_POST['description'];
            if (empty($name)||empty($description)){
                $this->error="Tên hoặc Mô tả không được trống";
            }
            if(empty($this->error)){
                $category_model->name=$name;
                $category_model->description=$description;
                $is_insert=$category_model->create();
                if(!$is_insert){
                    $_SESSION['error']='Thêm thất bại';
                }
                else{
                    $_SESSION['success']='Thêm thành công';
                    header('Location:index.php?controller=category&action=index');
                    exit();
                }
            }
        }
        $this->content=$this->render('views/categories/create.php');
        require_once 'views/layouts/main.php';
    }
    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=category&action=index');
            exit();
        }
        $id = $_GET['id'];
        $category_model=new Category();
        $category=$category_model->getOne($id);
        if(isset($_POST['update'])){
            $name=$_POST['name'];
            $description=$_POST['description'];
            if (empty($name)||empty($description)){
                $this->error="Tên hoặc Mô tả không được trống";
            }
            if(empty($this->error)){
                $category_model->name=$name;
                $category_model->description=$description;
                $is_update=$category_model->update($id);
                if(!$is_update){
                    $_SESSION['error']='Update thất bại';
                }
                else{
                    $_SESSION['success']='Update thành công';
                    header("Location:index.php?controller=category&action=index");
                    exit();
                }
            }
        }
        $this->content=$this->render('views/categories/update.php',['category'=>$category]);
        require_once 'views/layouts/main.php';
    }
    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'id không hợp lệ';
            header('Location:index.php?controller=category&action=index');
            exit();
        }
        $id = $_GET['id'];
        $category_model=new Category();
        $is_delete=$category_model->delete($id);
        if(!$is_delete){
            $_SESSION['error']="Xóa bản ghi $id thất bại";
        }
        else{
            $_SESSION['success']="Xóa bản ghi $id thành công";
            header("Location:index.php?controller=category&action=index");
            exit();
        }
    }
}
