<?php
    include_once "../database/Database.php";

    include_once "../class/Employee.php";

    //ini_set("display_errors",1);

    if($_SERVER['REQUEST_METHOD']=='PUT'){


    $db = new Database();

    $mysqli = $db->getConection();

    $emp = new Employee($mysqli);

    $formdata = json_decode(file_get_contents("php://input"));

    

        if(
            !empty($formdata->name) &&
            !empty($formdata->email) &&
            !empty($formdata->designation) &&
            !empty($formdata->id)
            
            ){

                $name = $formdata->name;
                $email = $formdata->email;
                $designation = $formdata->designation;
                $id = $formdata->id;

                if($emp){
                    if($emp->updateEmployee($name,$email,$designation,$id)){
                        http_response_code(200);
                        json(1,"employee updated suscessfully",$formdata);
                        }
                    else{
                        http_response_code(500);
                        json(0,"failed to update employee");
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