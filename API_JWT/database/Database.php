<?php

/**
 * Database short summary.
 *
 * Database description.
 *
 * @version 1.0
 * @author rodri
 */
class Database
{
    private $hostname = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "php_rest_api_jwt_auth";



    public function getConection() {


        $mysqli = new mysqli(
        $this->hostname,
        $this->user,
        $this->password,
        $this->dbname
        );

        if($mysqli->connect_errno > 0){
            die("Error : ".$mysqli->connect_error);
        }

        else {
            echo "coneccion exitosa";
            return $mysqli;
        }


    }
}