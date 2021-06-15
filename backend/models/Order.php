<?php
require_once 'models/Model.php';
class Order extends Model{
    public function getAll(){
        $sql_get_all="Select * from oder  ORDER BY id_oder DESC LIMIT {$this->startpoint},{$this->per_page}";
        $obj_get_all=$this->connection->prepare($sql_get_all);
        $obj_get_all->execute();
        $oders=$obj_get_all->fetchAll(PDO::FETCH_ASSOC);
        return $oders;
    }
    public function getOder($id){
        $sql_get_oder="Select * FROM oder_details INNER JOIN computers ON oder_details.id_computer=computers.id_computer where id_oder=$id";
        $obj_get_oder=$this->connection->prepare($sql_get_oder);
        $obj_get_oder->execute();
        $oders=$obj_get_oder->fetchAll(PDO::FETCH_ASSOC);
        return $oders;
    }
}
