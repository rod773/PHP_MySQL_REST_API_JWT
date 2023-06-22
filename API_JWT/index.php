<?php

include_once("./database/Database.php");
include_once("./class/Employee.php");


$db = new Database();



$mysqli = $db->getConection();

$emp = new Employee($mysqli);


$name = "ppepe"  ;

$email = "pepe@gmail.com" ;

$designation = "developer"  ;

$emp->updateEmployee($name,$email,$designation,1);



















