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
    private $id;
    private $name;
    private $email;
    private $designation;
    private $connection;


    //database init
    public function __construct($db){
        $this->connection = $db;
    }

    //insert
    public function addEmployee(){
        $sql = "insert into $this->empTable (name, email, designation) "
            + "values (?,?,?)";

        if($stmt = $this->connection->prepare($sql)){

            $this->name = htmlspecialchars(strip_tags($this->name));

            $this->name = htmlspecialchars(strip_tags($this->email));

            $this->name = htmlspecialchars(strip_tags($this->designation));

            $stmt->bind_param("sss",$this->name,$this->email,$this->designation);

            if($stmt->execute){
                return true;
            }
            else{
                return false;
            }
        }
    }

    //read
    public function listEmployee(){

    }

    //update
    public function updateEmployee(){

    }

    //delete
    public function deleteEmployee(){

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