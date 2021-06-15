<?php
require_once 'models/Model.php';
class Hsx extends Model{
    public $id_manufacturer;
    public $name_manufacturer;
    public $avatar;
    public $created_at;
    public function getAll(){
        $sql_get_all="select * from manufacturer limit {$this->startpoint},{$this->per_page}";
        $obj_get_all=$this->connection->prepare($sql_get_all);
        $obj_get_all->execute();
        $hsxs=$obj_get_all->fetchAll(PDO::FETCH_ASSOC);
        return $hsxs;
    }
    public function create(){
        $sql_insert="INSERT INTO manufacturer(`name_manufacturer`,`avatar`) VALUES (:name,:avatar)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
            ':name'=>$this->name_manufacturer,
            ':avatar'=>$this->avatar,
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function getOne($id){
        $sql_select_one="SELECT * FROM manufacturer where id_manufacturer=$id";
        $obj_select_one=$this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        $hsx=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $hsx;
    }
    public function update($id){
        $sql_update="UPDATE manufacturer set `name_manufacturer`=:name,`avatar`=:avatar where id_manufacturer=$id";
        $obj_update=$this->connection->prepare($sql_update);
        $arr_update=[
            ':name'=>$this->name_manufacturer,
            'avatar'=>$this->avatar,
        ];
        return $obj_update->execute($arr_update);
    }
    public function delete($id){
        $sql_delete="DELETE FROM manufacturer where id_manufacturer=$id;DELETE FROM computers where id_manufacturer=$id";
        $obj_delete=$this->connection->prepare($sql_delete);
        return $obj_delete->execute();
    }
}
