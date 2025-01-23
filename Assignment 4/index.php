<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงข้อมูลนิสิตทั้งหมด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            margin-top: 20px;
            text-align: center;
        }
        .table-container {
            margin: 20px auto;
            max-width: 900px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .btn-container {
            text-align: right;
            margin-bottom: 10px;
        }
        .btn-custom {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>แสดงข้อมูลนิสิตทั้งหมด</h1>
    <div class="table-container">
        <div class="btn-container">
            <a href="addnew.php" class="btn btn-primary">เพิ่มข้อมูล</a>
        </div>
        <?php

        include 'student.php';

        if (!empty($_SESSION['students'])) {
            echo '<p>มีข้อมูลนิสิต ' . count($_SESSION['students']) . ' คน</p><hr>';

            echo '
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>รหัสนิสิต</th>
                            <th>คำนำหน้า</th>
                            <th>ชื่อนิสิต</th>
                            <th>นามสกุลนิสิต</th>
                            <th>ชั้นปี</th>
                            <th>เกรดเฉลี่ย</th>
                            <th>วันเกิด</th>
                            <th>จัดการข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
            ';

            foreach ($_SESSION['students'] as $student) {
                echo '
                    <tr>
                        <td>' . $student->id . '</td>
                        <td>' . $student->prefix . '</td>
                        <td>' . $student->first_name . '</td>
                        <td>' . $student->last_name . '</td>
                        <td>' . $student->year . '</td>
                        <td>' . $student->gpa . '</td>
                        <td>' . $student->birthday . '</td>
                        <td>
                            <a href="edit.php?id=' . $student->id . '" class="btn btn-warning btn-sm btn-custom">แก้ไข</a>
                            <a href="delete.php?id=' . $student->id . '" class="btn btn-danger btn-sm btn-custom">ลบข้อมูล</a>
                        </td>
                    </tr>
                ';
            }

            echo '</tbody></table>';
        } else {
            echo '<p class="text-center text-muted">ยังไม่มีข้อมูลนิสิต</p>';
        }
        
        ?>
    </div>
</body>
</html>
