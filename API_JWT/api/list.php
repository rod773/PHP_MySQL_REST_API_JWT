<?php

    include_once "../database/Database.php";

    include_once "../class/Employee.php";
    //ini_set("display_errors",1);


    $db = new Database();

    $mysqli = $db->getConection();

    $emp = new Employee($mysqli);

    $empId = !empty($_GET['id']) ? $_GET['id'] : 0 ;

    if($empId>0){

        $result = $emp->listEmployee($empId);

    }else {

        $result = $emp->listEmployee();

    }

    

    if($result->num_rows>0){

        $allEmployees = $result->fetch_all(MYSQLI_ASSOC);

        http_response_code(200);

        json(1,"Enployee data",$allEmployees);
    }
    else{
        http_response_code(404);
        json(0,"No employee found");
    }



?>