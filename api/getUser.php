<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require __DIR__ . '/classes/Database.php';
require __DIR__ . '/classes/AuthMiddleware.php';

$allHeaders = getallheaders();
$db_connection = new Database();
$conn = $db_connection->dbConnection();
$auth = new Auth($conn, $allHeaders);

$res = json_encode($auth->isValid());
$restoo = $auth->isValid();

// echo $res;

$haystack = $restoo['user']['roles'];
$needle = ",";
$flag = strstr($haystack, $needle);

if ($flag) {

    $userroles = explode(",", $restoo['user']['roles']);

} else {
    $userroles = explode(" ", $restoo['user']['roles']);
}

var_dump($userroles);
print_r($userroles); // <---fuck
$userroles = array_map('trim', $userroles);
  echo $restoo['user']['roles'];

// echo count($userroles);
 

if (in_array("superadmin", $userroles)) {
    echo "user adalah superadmin";}
     
 

if (in_array("admin", $userroles)) {
    echo "user adalah admin";
}

if (in_array("user", $userroles)) {
    echo "user adalah user biasa";
}


$conn->close();

 

// DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));
var_dump($data);
$returnData = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    $stmt = null;

}

   


