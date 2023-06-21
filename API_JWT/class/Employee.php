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
        $this->connextion = $db;
    }

    //insert
    public function addEmployee(){

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