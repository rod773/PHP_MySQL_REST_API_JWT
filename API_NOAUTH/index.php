<?php

include_once("./database/Database.php");
include_once("./class/Employee.php");


$db = new Database();



$mysqli = $db->getConection();

$emp = new Employee($mysqli);


$name = "ppepe"  ;

$email = "pepe@gmail.com" ;

$designation = "developer"  ;

$result = $emp->listEmployee(1);
echo "<pre>";
print_r($result->fetch_all());

//$request = $_SERVER['REQUEST_URI'];

//switch ($request) {
//    case '/' :
//        require __DIR__ . '/views/index.php';
//        break;
//    case '' :
//        require __DIR__ . '/views/index.php';
//        break;
//    case '/about' :
//        require __DIR__ . '/views/about.php';
//        break;
//    default:
//        http_response_code(404);
//        require __DIR__ . '/views/404.php';
//        break;
//}