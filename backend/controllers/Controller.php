<?php
class Controller{
    public $content;
    public $error;
    public function __construct()
    {
        if(!isset($_SESSION['username']) && $_GET['controller']!='acc'){
            $_SESSION['error']='Bạn chưa đăng nhập';
            header('Location:../fontend/index.php?controller=login&action=index');
            exit();
        }
    }

    public function render($file,$variable=[]){
        extract($variable);
        ob_start();
        require_once "$file";
        $render_view=ob_get_clean();
        return $render_view;
    }
}
