<?php
require_once 'models/Model.php';
class Home extends Model{
    public function getCategories(){
        $sql_select="SELECT * FROM manufacturer";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $manufacturers=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $manufacturers;
    }
    public function getProduct(){
        $sql_select="SELECT * FROM computers ORDER BY `view` DESC limit 5";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $products=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function getProductNew(){
        $sql_select="SELECT * FROM computers ORDER BY `id_computer` DESC LIMIT 8";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $productsnew=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $productsnew;
    }
}
