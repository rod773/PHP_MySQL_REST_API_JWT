<?php


    include_once "../database/Database.php";

    include_once "../class/Employee.php";
    //ini_set("display_errors",1);


    $db = new Database();

    $mysqli = $db->getConection();

    $emp = new Employee($mysqli);


    if($_SERVER['REQUEST_METHOD']=='DELETE'){



        $db = new Database();

        $mysqli = $db->getConection();

        $emp = new Employee($mysqli);

        $formdata = json_decode(file_get_contents("php://input"));

        //print_r($formdata);


        if(!empty($formdata->id)){

            $id = $formdata->id;

            if($emp){
                if($emp->deleteEmployee($id)){
                    http_response_code(200);
                    json(1,"employee deleted suscessfully",$formdata);
                }
                else{
                    http_response_code(500);
                    json(0,"failed to delete employee");
                }
            }

        }


    }
    else{
        http_response_code(500);
        json(0,"Invalid Request Method");
    }

?>