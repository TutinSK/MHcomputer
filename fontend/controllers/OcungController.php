<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/ocung.php';
class OcungController extends Controller{
    public function index(){
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $ocung_model=new ocung();
        $ocungs = $ocung_model->getAll();
        $page = $product_model->getPagination('harddrive');
        $this->content=$this->render('views/ocungs/index.php',['ocungs'=>$ocungs,'page'=>$page]);
        require_once 'views/layouts/product.php';
    }
}