<?php
    include 'student.php';

    $id = $_GET['id'];
    $students = $_SESSION['students'];

    foreach ($students as $key => $student) {
        if ($student->id == $id) {
            unset($students[$key]);
            break;
        }
    }

    $_SESSION['students'] = $students;

    header('Location: index.php');
?>