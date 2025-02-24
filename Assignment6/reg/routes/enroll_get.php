<?php

declare(strict_types=1);

if (!isset($_GET['id'])) {
    header('Location: /profile');
    exit;
} else {
    $id = (int)$_GET['id'];

    if (chkEnrollment($_SESSION['student_id'], $id)) {
        echo '<script>
            alert("You are already enrolled in this course");
            window.location.href = "/profile";
            </script>
        ';
    } else {
        $res = addEnrollment($_SESSION['student_id'], $id);

        if ($res) {
            header('Location: /profile');
        } else {
            echo 'something wrong';
        }
    }
}
