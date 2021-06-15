<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class ContactController extends Controller{
    public function index(){
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $this->content=$this->render('views/contact/index.php');
        require_once 'views/layouts/product.php';
    }
    public function about(){
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $this->content=$this->render('views/abouts/index.php');
        require_once 'views/layouts/product.php';
    }
}