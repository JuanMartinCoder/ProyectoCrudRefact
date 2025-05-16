<?php
/**
 * DEBUG MODE
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$request_raw = $_SERVER["REQUEST_URI"];
$request_clean = str_replace("/ProyectoCrudRefact/backend","",$request_raw);

switch ($request_clean) {
  case '/students':
    require_once("./routes/studentsRoutes.php");
    break;
  default:
    require_once("./routes/responseError.php");
    break;
}

?>
