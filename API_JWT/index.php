<?php

include_once("./database/Database.php");
include_once("./class/Employee.php");


$db = new Database();



$mysqli = $db->getConection();

$emp = new Employee($mysqli);


$name = "rod"  ;

$email = "rod@gmail.com" ;

$designation = "developer"  ;

$emp->addEmployee($name,$email,$designation);

$list = $emp->listEmployee();

print_r($list);















