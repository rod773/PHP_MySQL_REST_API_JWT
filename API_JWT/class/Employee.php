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

    private $connection;


    //database init
    public function __construct($db){
        $this->connection = $db;
    }





    //insert
    public function addEmployee($name,$email,$designation){

        $name = htmlspecialchars(strip_tags($name));
        $email = htmlspecialchars(strip_tags($email));
        $designation = htmlspecialchars(strip_tags($designation));

        $sql = "insert into ".$this->empTable." (name, email, designation) ".
            " values ( ? , ? , ? ) ";

        if($stmt = $this->connection->prepare($sql)){

            $stmt->bind_param("sss",$name,$email,$designation);

            try{
                $stmt->execute();
                
                return true;
            }
            catch(Exception $e) {
                echo $e->getMessage();
                
                return false;

            }
        }
    }

    //read
    public function listEmployee($id=null){

        if($id){

            $id = htmlspecialchars(strip_tags($id));

            $sql = "select * from $this->empTable where id= ? ";

            $stmt= $this->connection->prepare($sql);

            $stmt->bind_param("i",$id);


            }

        else{
            $sql = "select * from $this->empTable";

            $stmt = $this->connection->prepare($sql);

           }

        try{
            $stmt->execute();

            $result = $stmt->get_result();
            
            return $result;
        }
        catch(Exception $e) {
            echo $e->getMessage();

        }

    }

    //update
    public function updateEmployee($name,$email,$designation,$id){

        $name = htmlspecialchars(strip_tags($name));
        $email = htmlspecialchars(strip_tags($email));
        $designation = htmlspecialchars(strip_tags($designation));
        $id = htmlspecialchars(strip_tags($id));

        $sql = "update $this->empTable ".
            "set name = ? , email = ? , designation = ? ".
            "where id = ?";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param("sssi",$name,$email,$designation,$id);


        try{
            $stmt->execute();
            
            return true;

        }
            catch(Exception $e) {
            echo $e->getMessage()."<pre>";
            return false;
        }
    }

    //delete
    public function deleteEmployee($id){

        $id = htmlspecialchars(strip_tags($id));

        $sql = "delete from $this->empTable ".
            "where id = ?";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param("i",$id);

        try{
            $stmt->execute();
            
            return true;

        }
        catch(Exception $e) {
            echo $e->getMessage()."<pre>";
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