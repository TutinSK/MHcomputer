<?php
require_once 'models/Model.php';
class Acc extends Model{
    public $id;
    public $id_role;
    public $username;
    public $password;
    public function getRole(){
        $sql_select="SELECT * FROM role";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $roles=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    }
    public function create(){
        $sql_create="INSERT INTO username_tb(`id_role`,`username`,`password`) VALUES (:id_role,:username,:password)";
        $obj_create=$this->connection->prepare($sql_create);
        $arr_create=[
            ':id_role'=>$this->id_role,
            ':username'=>$this->username,
            ':password'=>$this->password,
        ];
        return $obj_create->execute($arr_create);
    }
    public function getAll(){
        $sql_get_all="SELECT * FROM username_tb INNER JOIN role ON username_tb.id_role=role.id_role {$this->querySearch} ORDER BY id_user DESC LIMIT {$this->startpoint},{$this->per_page}";
        $obj_select=$this->connection->prepare($sql_get_all);
        $obj_select->execute();
        $users=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function getOne($id){
        $sql_select_one="SELECT * FROM username_tb INNER JOIN role ON username_tb.id_role=role.id_role where id_user=$id";
        $obj_select_one=$this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        $user=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function update($id){
        $sql_update="UPDATE username_tb set `id_role`=:id_role,`username`=:username,`password`=:password WHERE id_user=$id";
        $obj_update=$this->connection->prepare($sql_update);
        $arr_update=[
            ':id_role'=>$this->id_role,
            ':username'=>$this->username,
            ':password'=>$this->password,
        ];
        return $obj_update->execute($arr_update);
    }
    public function getUser($username){
        $sql_select="SELECT * FROM username_tb where username= '$username'";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $user=$obj_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function delete($id){
        $sql_delete="DELETE FROM username_tb WHERE id_user=$id";
        $obj_delete=$this->connection->prepare($sql_delete);
        return $obj_delete->execute();
    }
}
