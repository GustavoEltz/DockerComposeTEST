<?php
$host = 'db';
$db = 'api_db';
$user = 'user';
$pass = 'password';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>