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
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php
        include 'student.php';

        $id = $_GET['id']; 
        $students = $_SESSION['students'];

        foreach ($students as $key => $student) {
            if ($student->id == $id) { 
                ?>

                <div class="text-center">
                    <h1>แก้ไขข้อมูลนิสิต</h1>
                </div>

                <div class="text-center">
                    <a href="index.php" class="btn btn-secondary btn-sm mb-4">กลับไปหน้าแรก</a>
                </div>

                <div class="form-container">
                    <form action="save.php" method="get">
                        <div class="form-group">
                            <label for="id">รหัสนิสิต</label>
                            <input type="text" class="form-control" name="id" id="id" value="<?=$student->id?>">
                        </div>

                        <div class="form-group">
                            <label for="prefix">คำนำหน้า</label>
                            <select name="prefix" id="prefix" class="form-control" value="<?=$student->prefix?>">
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="first_name">ชื่อ</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?=$student->first_name?>">
                        </div>

                        <div class="form-group">
                            <label for="last_name">นามสกุล</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?=$student->last_name?>">
                        </div>

                        <div class="form-group">
                            <label for="year">ชั้นปี</label>
                            <select name="year" id="year" class="form-control" value="<?=$student->year?>">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gpa">เกรดเฉลี่ย</label>
                            <input type="text" class="form-control" name="gpa" id="gpa" value="<?=$student->gpa?>">
                        </div>

                        <div class="form-group">
                            <label for="birthday">วันเกิด</label>
                            <input type="date" class="form-control" name="birthday" id="birthday" value="<?=$student->birthday?>">
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button>
                    </form>
                </div>

                <?php 
            }
        } 
    ?>
</body>
</html>
