<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Ram.php';
class RamController extends Controller{
    public function index(){
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $ram_model=new Ram();
        $rams = $ram_model->getAll();
        $page = $product_model->getPagination('ram');
        $this->content=$this->render('views/rams/index.php',['rams'=>$rams,'page'=>$page]);
        require_once 'views/layouts/product.php';
    }
    public function detail(){
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $id=$_GET['id'];
        $ram_model=new Ram();
        $ram=$ram_model->getOne($id);
        $this->content=$this->render('views/rams/detail.php',['ram'=>$ram]);
        require_once 'views/layouts/product.php';
    }

}
