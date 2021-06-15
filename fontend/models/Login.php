<?php
require_once 'models/Model.php';
class Login extends Model{
    public $username;
    public $id_role;
    public $password;
    public function getUser($username,$password){
        $sql_select="SELECT * FROM username_tb WHERE `username`='$username' AND `password`='$password'";

        $obj_select=$this->connection->prepare($sql_select);
//        $arr_select=[
//            ':username'=>$username,
//            ':password'=>$password,
//        ];
        $obj_select->execute();
        $user=$obj_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function getUser1($username){
        $sql_select="SELECT * FROM username_tb WHERE `username`='$username'";

        $obj_select=$this->connection->prepare($sql_select);
//        $arr_select=[
//            ':username'=>$username,
//            ':password'=>$password,
//        ];
        $obj_select->execute();
        $user=$obj_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function signup(){
        $sql_insert="INSERT INTO username_tb(`id_role`,`username`,`password`) VALUES ('1',:username,:password)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
            ':username'=>$this->username,
            ':password'=>$this->password,
        ];
        return $obj_insert->execute($arr_insert);
    }
}
