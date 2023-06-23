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
    private $userTable = "tbl_user";

    private $projectTable="projects";

    private $connection;


    public function __construct($db){
        $this->connection = $db;
    }

    public function registerUser($first_name,$last_name,$email,$password){



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