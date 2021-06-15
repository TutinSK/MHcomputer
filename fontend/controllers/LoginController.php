<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Login.php';
class LoginController extends Controller {
    public function index()
    {
//        unset($_SESSION['username']);
        $product_model = new Product();
        $login_model = new Login();
        $manufacturers = $product_model->getCategories();
        if (isset($_POST['dangnhap'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            if (empty($username) || empty($password)) {
                $this->error = "Username và Password không được để trống";
            }
            $user_check = $login_model->getUser($username, $password);

            if (empty($user_check)) {
                $this->error = "Username hoặc Password không đúng";
            } else {
                if ($user_check['id_role'] == 1) {
                    $_SESSION['username'] = $user_check['username'];
                    header('Location:index.php?controller=home&action=index');
                    exit();
                }
                if ($user_check['id_role'] == 2) {
                    $_SESSION['username'] = $user_check['username'];
                    header('Location:../backend/index.php?controller=maytinh&action=index');
                    exit();
                }
            }

        }
        if(isset($_POST['dangki'])){
            $username=$_POST['signupusername'];
            $password=($_POST['signuppassword']);
            $repassword=$_POST['repassword'];
            $user_check_sign=$login_model->getUser1($username);
            if(empty($username)||empty($password)||empty($repassword)){
                $this->error1="Không được để trống";
            }
            if($password!=$repassword){
                $this->error1="2 mật khẩu phải trùng nhau";
            }
            $password=md5($password);
            if (!empty($user_check_sign)){
                $this->error1="Username đã tồn tại";
            }
            if(empty($this->error1)){
                $login_model->username=$username;
                $login_model->password=$password;
                $is_signup=$login_model->signup();
                if(!$is_signup){
                    $this->error1="Đăng kí thất bại";
                }else{
                    $this->success="Đăng kí Thành công";
                }
            }
        }
        $this->content = $this->render('views/logins/index.php');
        require_once 'views/layouts/product.php';
    }
}
