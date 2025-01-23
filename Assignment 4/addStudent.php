<?php
    include 'student.php';

    $student = new Student($_GET['id'], $_GET['prefix'], $_GET['first_name'], $_GET['last_name'], $_GET['year'], $_GET['gpa'], $_GET['birthday']);
    
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $prefix = isset($_GET['prefix']) ? $_GET['prefix'] : null;
    $first_name = isset($_GET['first_name']) ? $_GET['first_name'] : null;
    $last_name = isset($_GET['last_name']) ? $_GET['last_name'] : null;
    $year = isset($_GET['year']) ? $_GET['year'] : null;
    $gpa = isset($_GET['gpa']) ? $_GET['gpa'] : null;
    $birthday = isset($_GET['birthday']) ? $_GET['birthday'] : null;
    
    array_push($_SESSION['students'], $student);

    header('Location: index.php');
?>