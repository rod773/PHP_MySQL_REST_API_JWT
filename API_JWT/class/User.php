<?php

/**
 * User short summary.
 *
 * User description.
 *
 * @version 1.0
 * @author rodri
 */
class User
{
    private $userTable = "tbl_users";

    private $projectTable="projects";

    private $connection;


    public function __construct($db){
        $this->connection = $db;
    }

    public function registerUser($first_name,$last_name,$email,$password){

        $sql = "insert into $this->userTable (first_name,last_name,email,password) ".
            "values ( ?, ?, ? , ?  ";

        if($stmt = $this->connection->prepare($sql)){

             $first_name = htmlspecialchars(strip_tags($first_name));
             $last_name = htmlspecialchars(strip_tags($last_name));
             $email = htmlspecialchars(strip_tags($email));
             $password = htmlspecialchars(strip_tags($password));


             $stmt->bind_param("ssss",$first_name,$last_name,$email,$password);

             try{
                   $stmt->execute() ;
                   return true;

             }catch(Exception $e) {

                   echo $e->getMessage();
                   return false;

             }
        }



    }

    public function checkUser($email){

    }


    public function createProject(){



    }

    public function listProjects(){

    }




}


function json($status,$message,$data=array()){

    $data = array(
        "status" => $status,
        "message" => $message,
        "data" => $data,
    );

    $json_encoded_data = json_encode($data);


    print_r($json_encoded_data);


    die;

}