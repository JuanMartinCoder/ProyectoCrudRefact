<?php

require "./utils/utils.php";

$env = LoadEnvFile(__DIR__."/.env");

if (!$env) {
  http_response_code(500);
  die(json_encode(["error" => "Database connection failed"]));
}

$host = getenv("DB_HOST");
$user = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$database = getenv("DB");

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode(["error" => "Database connection failed"]));
}
?>
