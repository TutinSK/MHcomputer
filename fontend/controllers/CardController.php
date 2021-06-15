<?php
require_once 'controllers/Controller.php';
require_once 'models/Card.php';
require_once 'models/Product.php';
class CardController extends Controller{
    public function add(){
        $id=$_GET['id'];
        $card_model=new Card();
        $product=$card_model->getOne($id);
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        $card=[
            'name'=>$product['name_computer'],
            'price'=>$product['price'],
            'avatar'=>$product['picture'],
            'hsx'=>$product['name_manufacturer'],
            'id_hsx'=>$product['id_manufacturer'],
            'quality'=>1
        ];
        if(!isset($_SESSION['card'])){
            $_SESSION['card'][$id]=$card;
        }else{
            if(!array_key_exists($id,$_SESSION['card'])){
                $_SESSION['card'][$id]=$card;
            }else{
                $_SESSION['card'][$id]['quality']++;
            }
        }
        $url=$_SERVER['SCRIPT_NAME'];
        header("Location:$url"."/gio-hang-cua-ban");
    }
    public function index(){
        $product_model = new Product();
        $manufacturers = $product_model->getCategories();
        if (isset($_POST['submit'])){
            //lặp giỏ hàng và gán số lượng tương ứng với sản phẩm trong giỏ hàng tương ứng
            foreach ($_SESSION['card'] as $product_id=>$cart){
                $_SESSION['card'][$product_id]['quality']=$_POST[$product_id];
            }
            $_SESSION['success']="Cập nhật giỏ hàng thành công";
        }
        $this->content=$this->render('views/cards/index.php');
        require_once 'views/layouts/product.php';
    }
    public function delete(){
        $product_id=$_GET['id'];
        unset($_SESSION['card'][$product_id]);
        //nếu xóa hết toàn bộ sản phẩm trong giỏ hàng thì xóa luôn giỏ hàng đó;
        if(empty($_SESSION['card'])){
            unset($_SESSION['card']);
        }
        $_SESSION['success']="Xóa sản phẩm thành công";
        //khi chuyển hướng về trang rỏ hàng của bạn thì cần lấy đc url gốc của ứng dụng $_Sever['SCRIP_NAME']
        $url_redirect=$_SERVER['SCRIPT_NAME'].'/gio-hang-cua-ban';
        header("Location:$url_redirect");
        exit();
    }
}