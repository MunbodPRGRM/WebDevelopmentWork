<?php

declare(strict_types=1);

if (!isset($_GET['id'])) {
    header('Location: /profile');
    exit;
} else {
    $id = (int)$_GET['id'];
    $res = withdrawEnrollment($id);

    if ($res) {
        header('Location: /profile');
    } else {
        echo 'something wrong';
    }
}
