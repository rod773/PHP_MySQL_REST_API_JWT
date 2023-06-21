<?php

/**
 * Employee short summary.
 *
 * Employee description.
 *
 * @version 1.0
 * @author rodri
 */
class Employee
{
    private $empTable = "tbl_employees";
    public $id;
    public $name;
    public $email;
    public $designation;
    private $connection;


    //database init
    public function __construct($db){
        $this->connection = $db;
    }

    //insert
    public function addEmployee(){

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->designation = htmlspecialchars(strip_tags($this->designation));

        $sql = "insert into ".$this->empTable." (name, email, designation) ".
            " values ( ? , ? , ? ) ";

        if($stmt = $this->connection->prepare($sql)){

            $stmt->bind_param("sss",$this->name,$this->email,$this->designation);

            if($stmt->execute()){
                echo "success";die;
               return true;
            }
            else{
               echo "failed";die;
              
               return false;
            }
        }
    }

    //read
    public function listEmployee(){

        if($this->id){

            $sql = "select from $this->empTable where id= ? ";

            $stmt= $this->connection->prepare($sql);

            $stmt->bind_param("i",$this->id);


            }

        else{
            $sql = "select * from $this->empTable";

            $stmt = $this->connection->prepare($sql);

           }

        $stmt->execute();

        $result = $stmt->get_result();

        return $result;

    }

    //update
    public function updateEmployee(){

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->designation = htmlspecialchars(strip_tags($this->designation));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $sql = "update $this->empTable "+
            "set name = ? , email = ? , designation = ? "+
            "where id = ?";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param("sssi",$this->name,$this->email,$this->designation,$this->id);

        if($stmt->execute()){
            return true;
        }
        else {
            return false;
        }
    }

    //delete
    public function deleteEmployee(){

        $this->id = htmlspecialchars(strip_tags($this->id));

        $sql = "delete from $this->empTable "+
            "where id = ?";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param("i",$this->id);

        if($stmt->execute()){
            return true;
        }
        else {
            return false;
        }
    }



}


function json($status,$message,$data=array()){

    $data = array(
        "status" => $status,
        "maeage" => $message,
        "data" => $data,
    );

     $json_encoded_data = json_encode($data);


     print_r($json_encoded_data);


     die;

}