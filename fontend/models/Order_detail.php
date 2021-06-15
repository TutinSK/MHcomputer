<?php
require_once 'models/Model.php';
class Order_detail extends Model{
    public $id_order;
    public $id_computer;
    public $id_ram;
    public $id_harddrive;
    public $quality;
    public function insert(){
        $sql_insert="INSERT INTO oder_details(`id_oder`,`id_computer`,`id_ram`,`id_harddrive`,`quality`) VALUES (:id_oder,:id_computer,:id_ram,:id_harddrive,:quality)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
            ':id_oder'=>$this->id_order,
            ':id_computer'=>$this->id_computer,
            ':id_ram'=>$this->id_ram,
            ':id_harddrive'=>$this->id_harddrive,
            ':quality'=>$this->quality,
        ];
        $sql_update="UPDATE computers set `amount`=`amount` - :quality where id_computer=:id_computer";
        $obj_update=$this->connection->prepare($sql_update);
        $arr_update=[
          ':quality'=>$this->quality,
          ':id_computer'=>$this->id_computer,
        ];
        $obj_update->execute($arr_update);
        return $obj_insert->execute($arr_insert);
    }
}
