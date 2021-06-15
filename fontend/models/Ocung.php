<?php
require_once 'models/Model.php';
class Ocung extends Model{
    public function getAll(){
        $sql_get_all="SELECT * FROM harddrive {$this->querySearch} ORDER BY id_harddrive DESC LIMIT {$this->startpoint},{$this->per_page}";
        $obj_get_all=$this->connection->prepare($sql_get_all);
        $obj_get_all->execute();
        $ocungs=$obj_get_all->fetchAll(PDO::FETCH_ASSOC);
        return $ocungs;
    }
}