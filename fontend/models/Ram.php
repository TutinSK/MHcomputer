<?php
require_once 'models/Model.php';
class Ram extends Model{
    public function getAll(){
        $sql_get_all="SELECT * FROM ram {$this->querySearch} ORDER BY id_ram DESC LIMIT {$this->startpoint},{$this->per_page}";
        $obj_get_all=$this->connection->prepare($sql_get_all);
        $obj_get_all->execute();
        $rams=$obj_get_all->fetchAll(PDO::FETCH_ASSOC);
        return $rams;
    }
    public function getOne($id){
        $sql_get_one="SELECT * FROM ram where id_ram=$id";
        $sql_update="UPDATE ram set view=view+1 where id_ram=$id";
        $obj_select_one=$this->connection->prepare($sql_get_one);
        $obj_update=$this->connection->prepare($sql_update);
        $obj_select_one->execute();
        $obj_update->execute();
        $ram=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $ram;
    }
}