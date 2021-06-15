<?php
require_once 'models/Model.php';
class Category extends Model{
    public $id_category;
    public $name;
    public $description;
    public $created_at;
    public function getAll(){
        $sql_select_all="Select * from categories limit {$this->startpoint},{$this->per_page}";
        $obj_select=$this->connection->prepare($sql_select_all);
        $obj_select->execute();
        $categories=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function getOne($id){
        $sql_select_one="Select * from categories where id_category=$id";
        $obj_select_one=$this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        $category=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $category;
    }
    public function create(){
        $sql_insert="INSERT INTO categories(`name_category`,`description`) VALUES (:name,:description)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
            ':name'=>$this->name,
            ':description'=>$this->description,
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function update($id){
        $sql_update="UPDATE categories set `name_category`=:name,
                                            `description`=:description where id_category=$id";
        $obj_update=$this->connection->prepare($sql_update);
        $arr_update=[
            ':name'=>$this->name,
            ':description'=>$this->description,
        ];
        return $obj_update->execute($arr_update);
    }
    public function delete($id){
        $sql_delete="Delete from categories where id_category=$id ; DELETE FROM computers where id_category=$id ;DELETE FROM ram where id_category=$id ; DELETE FROM harddrive where id_category=$id";
        $obj_delete=$this->connection->prepare($sql_delete);
        return $obj_delete->execute();

    }

}
