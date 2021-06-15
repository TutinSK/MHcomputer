<?php
require_once 'models/Model.php';
class Ocung extends Model{
    public $id_harddrive;
    public $id_category;
    public $name;
    public $category_harddrive;
    public $price;
    public $picture;
    public $capacity;
    public $amount;
    public $views;
    public function getAll(){
        $sql_select_all="Select * from harddrive inner join category_disk on harddrive.category_harddrive=category_disk.id 
inner  join categories on harddrive.id_category=categories.id_category {$this->querySearch} ORDER BY id_harddrive DESC LIMIT {$this->startpoint},{$this->per_page}";
        $obj_select=$this->connection->prepare($sql_select_all);
        $obj_select->execute();
        $drives=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return$drives;
    }
    public function getHard(){
        $sql_select_all="Select * from category_disk";
        $obj_select=$this->connection->prepare($sql_select_all);
        $obj_select->execute();
        $drives=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return$drives;
    }
    public function create(){
        $sql_insert="Insert into harddrive(`id_category`,`name`,`category_harddrive`,`capacity`,`price`,`picture`,`amount`)
                        VALUES ('3',:name,:category_harddrive,:capacity,:price,:picture,:amount)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arrinsert=[
          ':name'=>$this->name,
          ':category_harddrive'=>$this->category_harddrive,
          ':capacity'=>$this->capacity,
          ':price'=>$this->price,
          ':picture'=>$this->picture,
          ':amount'=>$this->amount,
        ];
        return $obj_insert->execute($arrinsert);
    }
    public function getOne($id){
        $sql_get_one="Select * from harddrive inner join category_disk on harddrive.category_harddrive=category_disk.id 
        inner  join categories on harddrive.id_category=categories.id_category where id_harddrive=$id";
        $obj_select_one=$this->connection->prepare($sql_get_one);
        $obj_select_one->execute();
        $drive=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $drive;
    }
    public function update($id){
        $sql_update="Update harddrive set `id_category`=3,
                                           `name`=:name,
                                           `category_harddrive`=:category_harddrive,
                                           `capacity`=:capacity,
                                           `price`=:price,
                                           `picture`=:picture,
                                            `amount`=:amount where id_harddrive=$id";
        $obj_update=$this->connection->prepare($sql_update);
        $arrupdate=[
            ':name'=>$this->name,
            ':category_harddrive'=>$this->category_harddrive,
            ':capacity'=>$this->capacity,
            ':price'=>$this->price,
            ':picture'=>$this->picture,
            ':amount'=>$this->amount,
        ];
        return $obj_update->execute($arrupdate);
    }
    public function delete($id){
        $sql_delete="Delete from harddrive where id_harddrive=$id";
        $obj_delete=$this->connection->prepare($sql_delete);
        return $obj_delete->execute();
    }
}
