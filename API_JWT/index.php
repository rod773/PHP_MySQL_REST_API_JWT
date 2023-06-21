<?php

include_once("./database/Database.php");
include_once("./class/Employee.php");


$db = new Database();



$mysqli = $db->getConection();

$emp = new Employee($mysqli);


$emp->name = "rod";

$emp->email = "rod@gmail.com";

$emp->designation = "developer";

$emp ->addEmployee();

















