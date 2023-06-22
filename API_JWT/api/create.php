<?php

    //ini_set("display_errors",1);

    if($_SERVER['REQUEST_METHOD']=='POST'){
        include_once "../database/Database.php";

    include_once "../class/Employee.php";


    $db = new Database();

    $mysqli = $db->getConection();

    $emp = new Employee($mysqli);

    $formdata = json_decode(file_get_contents("php://input"));


    if(
        !empty($formdata->name) &&
        !empty($formdata->email) &&
        !empty($formdata->designation)
        ){

        $name = $formdata->name;
        $email = $formdata->email;
        $designation = $formdata->designation;

        if($emp){
           if($emp->addEmployee($name,$email,$designation)){
               http_response_code(200);
               json(1,"employee added suscessfully");
           }
         else{
             http_response_code(500);
             json(0,"failed to create an employee");
           }
        }
    }
    else{
        http_response_code(404);
        json(0,"input values required");
    }

    }
    else{
        http_response_code(500);
        json(0,"Invalid Request Method");
    }



?>