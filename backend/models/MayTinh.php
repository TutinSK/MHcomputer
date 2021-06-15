<?php
require_once 'configs/database.php';
require_once 'models/Model.php';
class MayTinh extends Model {
    public $id;
    public $name;
    public $id_category;
    public $id_manufacturer;
    public $price;
    public $cpu;
    public $card;
    public $ram;
    public $memory;
    public $opsystem;
    public $port;
    public $webcam;
    public $weight;
    public $screem;
    public $color;
    public $description;
    public $amount;
    public $pin;
    public $picture;
    public $picture1;
    public $picture2;
    public $picture3;
    public $created_at;
    public $views;

    public function getAll(){
        $sql_select_all="SELECT * FROM computers inner join categories ON computers.id_category=categories.id_category
        inner  join manufacturer on computers.id_manufacturer=manufacturer.id_manufacturer {$this->querySearch}  ORDER BY id_computer DESC LIMIT {$this->startpoint},{$this->per_page} ";
        $obj_select_all=$this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $computers=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $computers;
    }
    public function getOne($id){
        $sql_select_one="SELECT * FROM computers inner join categories ON computers.id_category=categories.id_category 
        inner  join manufacturer on computers.id_manufacturer=manufacturer.id_manufacturer  where id_computer=$id ORDER BY id_computer DESC";
        $obj_select_one=$this->connection->prepare($sql_select_one);
        $obj_select_one->execute();
        $maytinh=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $maytinh;
    }
    public function delete($id){
        $sql_delete="Delete from computers where id_computer=$id";
        $obj_delete=$this->connection->prepare($sql_delete);
        return $obj_delete->execute();
    }
    public function loadcategories(){
        $sql_select="select * from categories";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        return $categories=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function loadmanufacturer(){
        $sql_select="select * from manufacturer";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        return $categories=$obj_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create(){
//        $sql_insert="Insert into computers
//(`name_computer`,`id_category`,`id_manufacturer`,`price`,`cpu`,`ram`,`card`,`memory`,`opsystem`,`port`,
//`webcam`,`screem`,`color`,`description`,`amount`,`weight`,`pin`,`picture`,`picture1`,`picture2`,`picture3`)
//values (:name_param,:id_category,id_manufacturer,:price_param,:cpu_param,:ram_param,:card_param,:memory_param,:opsystem_param,
//:port_param,:webcam_param,:screem_param,:color_param,:description_param,:amount_param,
//:weight_param,:pin_param,:picture_param,:picture1_param,:picture2_param,:picture3_param)";
        $sql_insert="Insert into computers(`name_computer`,`id_category`,`id_manufacturer`,`price`,`cpu`,`ram`,`card`,`memory`,`opsystem`,`port`,
                    `webcam`,`screem`,`color`,`description`,`amount`,`weight`,`pin`,`picture`,`picture1`,`picture2`,`picture3`) 
                    VALUES (:name,:category,:manufacturer,:price,:cpu,:ram,:card,:memory,:opsystem,:port,:webcam,:screem,:color,:description,:amount,:weight,:pin,
                    :picture,:picture1,:picture2,:picture3)";
        $obj_insert=$this->connection->prepare($sql_insert);
        $arr_insert=[
          ':name'=>$this->name,
          ':category'=>$this->id_category,
          ':manufacturer'=>$this->id_manufacturer,
          ':price'=>$this->price,
          ':cpu'=>$this->cpu,
          ':ram'=>$this->ram,
          ':card'=>$this->card,
          ':memory'=>$this->memory,
          ':opsystem'=>$this->opsystem,
          ':port'=>$this->port,
          ':webcam'=>$this->webcam,
          ':screem'=>$this->screem,
          ':color'=>$this->color,
          ':description'=>$this->description,
          ':amount'=>$this->amount,
          ':weight'=>$this->weight,
          ':pin'=>$this->pin,
          ':picture'=>$this->picture,
          ':picture1'=>$this->picture1,
          ':picture2'=>$this->picture2,
          ':picture3'=>$this->picture3,
        ];
        return $obj_insert->execute($arr_insert);
    }
    public function update($id){
        $sql_update=("Update computers set `name_computer`=:name,
                                          `id_category`=:category,
                                          `id_manufacturer`=:manufacturer,
                                          `price`=:price,
                                          `cpu`=:cpu,
                                          `ram`=:ram,
                                          `card`=:card,
                                          `memory`=:memory,
                                          `opsystem`=:opsystem,
                                          `port`=:port,
                                          `webcam`=:webcam,
                                          `screem`=:screem,
                                          `color`=:color,
                                          `description`=:description,
                                          `amount`=:amount,
                                          `weight`=:weight,
                                          `pin`=:pin,
                                          `picture`=:picture,
                                          `picture1`=:picture1,
                                          `picture2`=:picture2,
                                          `picture3`=:picture3 where id_computer=$id");
        $obj_update=$this->connection->prepare($sql_update);
        $arr_update=[
            ':name'=>$this->name,
            ':category'=>$this->id_category,
            ':manufacturer'=>$this->id_manufacturer,
            ':price'=>$this->price,
            ':cpu'=>$this->cpu,
            ':ram'=>$this->ram,
            ':card'=>$this->card,
            ':memory'=>$this->memory,
            ':opsystem'=>$this->opsystem,
            ':port'=>$this->port,
            ':webcam'=>$this->webcam,
            ':screem'=>$this->screem,
            ':color'=>$this->color,
            ':description'=>$this->description,
            ':amount'=>$this->amount,
            ':weight'=>$this->weight,
            ':pin'=>$this->pin,
            ':picture'=>$this->picture,
            ':picture1'=>$this->picture1,
            ':picture2'=>$this->picture2,
            ':picture3'=>$this->picture3,
        ];
        return $obj_update->execute($arr_update);

    }
    public function seach($query_seach){
        $sql_seach="SELECT * FROM computers inner join categories ON computers.id_category=categories.id_category
        inner  join manufacturer on computers.id_manufacturer=manufacturer.id_manufacturer{$query_seach} ORDER BY id_computer DESC LIMIT {$this->startpoint},{$this->per_page}";
        $obj_seach=$this->connection->prepare($sql_seach);
        $obj_seach->execute();
        $arrseachs=$obj_seach->fetchAll(PDO::FETCH_ASSOC);
        return $arrseachs;

    }
}
