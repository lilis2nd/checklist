<?php
$server = "localhost";
$user = "qc";
$password = "astkorea1355)(*";
$dbname = "checklist";

$conn = new mysqli($server, $user, $password, $dbname);

if ($conn->connect_error) {
die("mysql 연결 실패: " . $conn->connect_error);
}
?>