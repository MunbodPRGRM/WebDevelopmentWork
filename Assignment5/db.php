<?php

$server = "localhost";
$username = "mystudent";
$password = "abc123";
$dbname = "mystudent";

$conn = new mysqli($server, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
