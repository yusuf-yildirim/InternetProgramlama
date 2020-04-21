<?php


// required headers
header("Access-Control-Allow-Origin: http://localhost:8081/InternetProgramlama");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// database connection will be here
// files needed to connect to database
include_once 'config.php';
include_once 'api/objets/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// instantiate product object
$user = new User($db);

// submitted data will be here


class create_user
{



    function create()
    {
        // get posted data
        $data = json_decode(file_get_contents("php://input"));

/*
        $user->firstname = $data->firstname;
        $user->lastname = $data->lastname;
        $user->email = $data->email;
        $user->password = $data->password;
*/
    }
}




