<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$controller=isset($_GET['controller'])?$_GET['controller']:'home';
$action=isset($_GET['action'])?$_GET['action']:'index';
$controller=ucfirst($controller);
$controller.="Controller";
$patch_controller="controllers/$controller.php";
//echo "<pre>";
//print_r($patch_controller);
//echo "</pre>";
if(!file_exists($patch_controller)){
    die("Trang bạn tìm không tồn tại");
}
require_once "$patch_controller";
$object=new $controller();
if(!method_exists($object,$action)){
    die("Phương thức $action không  tồn tại");
}
$object->$action();
