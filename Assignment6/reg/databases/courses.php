<?php

function getCourses(): mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'select * from courses';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();

    return $result;
}