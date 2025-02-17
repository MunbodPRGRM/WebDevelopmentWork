<?php

include 'db.php';

$username = 'admin';
$password = 'admin';

$sql = 'update user set password = ? where username = ?';
$stmt = $conn->prepare($sql);
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt->bind_param("ss", $hash, $username);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo 'Update completed';
} else {
    echo 'Update failed';
}
