<?php
require_once 'models/Model.php';
class Payment extends Model{
        public $id_oder;
        public $fullname;
        public $phone;
        public $email;
        public $address;
        public $total_price;
        public $payment_status;
        public function insert(){
            $sql_insert="INSERT INTO oder(`fullname`,`phone`,`email`,`address`,`total_price`) VALUES (:fullname,:phone,:email,:address,:total_price)";
            $obj_insert=$this->connection->prepare($sql_insert);
            $arr_insert=[
                ':fullname'=>$this->fullname,
                ':phone'=>$this->phone,
                ':email'=>$this->email,
                ':address'=>$this->address,
                ':total_price'=>$this->total_price,
            ];
            $obj_insert->execute($arr_insert);
            $id_order=$this->connection->lastInsertId();
            return $id_order;
        }
}
