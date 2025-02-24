<?php

$conn = getConnection();

for ($i = 1; $i <= 10; $i++) {
    $password = '1234';
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = 'update students set password = ? where student_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $hashed_password, $i);
    $stmt->execute();
}

echo 'update and hash complete.';
