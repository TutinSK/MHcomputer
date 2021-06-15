<?php
require_once 'controllers/Controller.php';
require_once 'models/Home.php';
class HomeController extends Controller{
    public function index(){
        $home_model=new Home();
        $manufacturers=$home_model->getCategories();
        $products=$home_model->getProduct();
        $productsnew=$home_model->getProductNew();
//        echo "<pre>";
//        print_r($productsnew);
//        echo "</pre>";
//        die();
        $this->content=$this->render('views/home/home.php',['manufacturers'=>$manufacturers,'products'=>$products,'productsnew'=>$productsnew]);
        require_once 'views/layouts/home.php';
    }
}
