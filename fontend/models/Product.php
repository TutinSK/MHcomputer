<?php
require_once 'models/Model.php';
class Product extends Model{
    public $id;
    public $price;
    public $name;
    public $category;
    public $hsx;
    public function getOne($id){
        $sql_select_one="SELECT * FROM computers INNER JOIN manufacturer ON computers.id_manufacturer=manufacturer.id_manufacturer where id_computer= $id";
        $sql_update="UPDATE computers SET `view`=`view`+1 WHERE id_computer= $id";
        $obj_select_one=$this->connection->prepare($sql_select_one);
        $obj_update=$this->connection->prepare($sql_update);
        $obj_update->execute();
        $obj_select_one->execute();
        $product=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
    public function getSame($id1,$id2){
        $sql_select_one="SELECT * FROM computers where id_manufacturer=$id1 AND id_computer NOT IN($id2) limit 3 ";
        $obj_select_one=$this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        $products=$obj_select_one->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getAll(){
        $sql_select_all="SELECT * FROM computers INNER JOIN manufacturer ON computers.id_manufacturer=manufacturer.id_manufacturer {$this->querySearch} ORDER BY id_computer DESC LIMIT {$this->startpoint},{$this->per_page}";
        $obj_select_all=$this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $products=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getByHsx($id){
        $sql_select="SELECT * FROM computers where id_manufacturer=$id ORDER BY id_computer DESC LIMIT {$this->startpoint},{$this->per_page}";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $computers=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $computers;
    }
}
