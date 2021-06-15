<?php
require_once 'models/Model.php';
class Ram extends Model{
    public $id_ram;
    public $id_categoty;
    public $name_ram;
    public $memory;
    public $bus;
    public $price;
    public $picture;
    public $amount;
    public $view;
    public $created_at;
    public function getAll(){
        $sql_select_all="Select * from ram inner  join categories on ram.id_category=categories.id_category  
            {$this->querySearch}  ORDER BY id_ram DESC LIMIT {$this->startpoint},{$this->per_page}";
        $obj_select_all=$this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $rams=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $rams;
    }
    public function insert(){
        $sql_insert="Insert into ram(`name_ram`,`memory`,`bus`,`price`,`amount`,`picture`) values 
                                   (:name_ram,:memory,:bus,:price,:amount,:picture)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arrinsert=[
            ':name_ram'=>$this->name_ram,
            ':memory'=>$this->memory,
            ':bus'=>$this->bus,
            ':price'=>$this->price,
            ':amount'=>$this->amount,
            ':picture'=>$this->picture,
        ];
        return $obj_insert->execute($arrinsert);
    }
    public function update($id){
        $sql_update="Update ram set `name_ram`=:name_ram,
                                    `memory`=:memory,
                                    `bus`=:bus,
                                    `price`=:price,
                                    `amount`=:amount,
                                    `picture`=:picture where id_ram=$id";
        $obj_update=$this->connection->prepare($sql_update);
        $arrupdate=[
            ':name_ram'=>$this->name_ram,
            ':memory'=>$this->memory,
            ':bus'=>$this->bus,
            ':price'=>$this->price,
            ':amount'=>$this->amount,
            ':picture'=>$this->picture,
        ];
        return $obj_update->execute($arrupdate);
    }
    public function getOne($id){
        $sql_get_one="Select * from ram where id_ram=$id";
        $obj_select_one=$this->connection->prepare($sql_get_one);
        $obj_select_one->execute();
        $ram=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $ram;
    }
    public function delete($id){
        $sql_delete="Delete from ram where id_ram=$id";
        $obj_delete=$this->connection->prepare($sql_delete);
        return $obj_delete->execute();
    }
}