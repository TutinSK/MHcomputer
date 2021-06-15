<?php
require_once 'models/Order.php';
require_once "controllers/Controller.php";
class OderController extends Controller{
    public function index(){
        $order_model=new Order();
        $oders=$order_model->getAll();
        $page=$order_model->getPagination('oder');
        $this->content=$this->render('views/orders/index.php',['oders'=>$oders,'page'=>$page]);
        require_once 'views/layouts/main.php';
    }
    public function view(){
        $id=$_GET['id'];
        $order_model=new Order();
        $oders=$order_model->getOder($id);
        $this->content=$this->render('views/orders/view.php',['oders'=>$oders]);
        require_once 'views/layouts/main.php';
    }
}