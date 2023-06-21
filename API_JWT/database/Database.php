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
    private $dbname = "php_rest_api_noauth";

    private $mysqli;


    public function getConection() {

        try{
            $this->mysqli = new mysqli(
            $this->hostname,
            $this->user,
            $this->password,
            $this->dbname
            );

            echo "<pre>";
            print_r($this->mysqli);

        }
        catch(Exception $e){
            echo "<pre>";
            echo $e->getMessage();
        }


        return $this->mysqli;


    }
}