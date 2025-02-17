<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลนิสิตใหม่</title>
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
    <div class="text-center">
        <h1>เพิ่มข้อมูลนิสิตใหม่</h1>
    </div>

    <div class="text-center">
        <a href="index.php" class="btn btn-secondary btn-sm mb-4">กลับไปหน้าแรก</a>
    </div>

    <div class="form-container">
        <form action="" method="post">
            <div class="form-group">
                <label for="id">รหัสนิสิต</label>
                <input type="text" class="form-control" name="id" id="id" required>
            </div>

            <div class="form-group">
                <label for="prefix">คำนำหน้า</label>
                <select name="prefix" id="prefix" class="form-control">
                    <option value="นาย">นาย</option>
                    <option value="นางสาว">นางสาว</option>
                    <option value="นาง">นาง</option>
                </select>
            </div>

            <div class="form-group">
                <label for="first_name">ชื่อ</label>
                <input type="text" class="form-control" name="first_name" id="first_name">
            </div>

            <div class="form-group">
                <label for="last_name">นามสกุล</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
            </div>

            <div class="form-group">
                <label for="year">ชั้นปี</label>
                <select name="year" id="year" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gpa">เกรดเฉลี่ย</label>
                <input type="text" class="form-control" name="gpa" id="gpa">
            </div>

            <div class="form-group">
                <label for="birthday">วันเกิด</label>
                <input type="date" class="form-control" name="birthday" id="birthday">
            </div>

            <div class="form-group">
                <label for="password">รหัสผ่าน</label>
                <input type="text" class="form-control" name="password" id="password">
            </div>

            <button type="submit" class="btn btn-primary btn-block">เพิ่มข้อมูล</button>
        </form>
    </div>
</body>

</html>

<?php

include 'session.php';
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

    $sql = 'insert into student (id, prefix, firstname, lastname, year, gpa, birthday, password) values (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssidss', $id, $prefix, $first_name, $last_name, $year, $gpa, $birthday, $hashed_password);
    $stmt->execute();

    header('Location: index.php');
}
?>