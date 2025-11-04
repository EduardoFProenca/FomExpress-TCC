<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fomexpress_db";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}
?>