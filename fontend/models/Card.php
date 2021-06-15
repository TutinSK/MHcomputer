<?php
require_once 'models/Model.php';
class Card extends Model{
    public function getOne($id){
        $sql_get_one="SELECT * FROM computers INNER JOIN manufacturer ON computers.id_manufacturer=manufacturer.id_manufacturer where id_computer= $id";
        $obj_get_one=$this->connection->prepare($sql_get_one);
        $obj_get_one->execute();
        $product=$obj_get_one->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
}
