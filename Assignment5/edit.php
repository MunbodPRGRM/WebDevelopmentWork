<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลนิสิต</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            margin-top: 20px;
            text-align: center;
            color: #343a40;
        }

        .form-container {
            margin: 50px auto;
            width: 50%;
            background: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php

    include 'session.php';
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = 'SELECT * FROM student WHERE id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $id);
            $stmt->execute();
            
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $student = $result->fetch_assoc();
    ?>

                <div class="text-center">
                    <h1>แก้ไขข้อมูลนิสิต</h1>
                </div>

                <div class="text-center">
                    <a href="index.php" class="btn btn-secondary btn-sm mb-4">กลับไปหน้าแรก</a>
                </div>

                <div class="form-container">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id">รหัสนิสิต</label>
                            <input type="text" class="form-control" name="id" id="id" value="<?= $student['id'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="prefix">คำนำหน้า</label>
                            <select name="prefix" id="prefix" class="form-control">
                                <option value="นาย" <?= $student['prefix'] == 'นาย' ? 'selected' : '' ?>>นาย</option>
                                <option value="นางสาว" <?= $student['prefix'] == 'นางสาว' ? 'selected' : '' ?>>นางสาว</option>
                                <option value="นาง" <?= $student['prefix'] == 'นาง' ? 'selected' : '' ?>>นาง</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="first_name">ชื่อ</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $student['firstname'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="last_name">นามสกุล</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $student['lastname'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="year">ชั้นปี</label>
                            <select name="year" id="year" class="form-control">
                                <option value="1" <?= $student['year'] == '1' ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= $student['year'] == '2' ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= $student['year'] == '3' ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= $student['year'] == '4' ? 'selected' : '' ?>>4</option>
                                <option value="5" <?= $student['year'] == '5' ? 'selected' : '' ?>>5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gpa">เกรดเฉลี่ย</label>
                            <input type="text" class="form-control" name="gpa" id="gpa" value="<?= $student['gpa'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="birthday">วันเกิด</label>
                            <input type="date" class="form-control" name="birthday" id="birthday" value="<?= $student['birthday'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="first_name">รหัสผ่าน</label>
                            <input type="text" class="form-control" name="password" id="password" value="<?= $student['password'] ?>">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button>
                    </form>
                </div>

    <?php
            }
        }
    }
    ?>
</body>

</html>

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ? $_POST['id'] : null;
    $prefix = $_POST['prefix'] ? $_POST['prefix'] : null;
    $first_name = $_POST['first_name'] ? $_POST['first_name'] : null;
    $last_name = $_POST['last_name'] ? $_POST['last_name'] : null;
    $year = $_POST['year'] ? $_POST['year'] : null;
    $gpa = $_POST['gpa'] ? $_POST['gpa'] : null;
    $birthday = $_POST['birthday'] ? $_POST['birthday'] : null;
    $password = $_POST['password'] ? $_POST['password'] : null;

    if ($password !== null) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }

    $sql = 'UPDATE student SET prefix = ?, firstname = ?, lastname = ?, year = ?, gpa = ?, birthday = ?, password = ? WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssidsss', $prefix, $first_name, $last_name, $year, $gpa, $birthday, $hashed_password, $id);
    $stmt->execute();

    header('Location: index.php');
}
?>