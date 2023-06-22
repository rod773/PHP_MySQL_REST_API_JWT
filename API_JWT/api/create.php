<?php

     ini_set("display_errors",1);

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
               json(1,"employee added suscessfully");
           }
         else{
             json(0,"failed to create an employee");
           }
        }
    }
    else{
        http_response_code(404);
        json(0,"input values required");
    }


?>