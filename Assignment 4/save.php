<?php
    include 'student.php';

    $id = $_GET['id'];
    $students = $_SESSION['students'];

    foreach ($students as $key => $student) {
        if ($student->id == $id) {
            $student->id = $_GET['id'];
            $student->prefix = $_GET['prefix'];
            $student->first_name = $_GET['first_name'];
            $student->last_name = $_GET['last_name'];
            $student->year = $_GET['year'];
            $student->gpa = $_GET['gpa'];
            $student->birthday = $_GET['birthday'];
            break;
        }
    }

    $_SESSION['students'] = $students;

    header('Location: index.php');
?>