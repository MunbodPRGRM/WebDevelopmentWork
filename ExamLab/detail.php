<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- เพิ่ม Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa; /* สีพื้นหลัง */
            }
            .container {
                max-width: 900px;
                margin: 30px auto;
                padding: 20px;
                background-color: #ffffff; /* พื้นหลังกล่อง */
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
            h1 {
                font-size: 2rem;
                color: #343a40;
                margin-bottom: 20px;
                text-align: center;
            }
            img {
                width: 100%;
                max-width: 300px;
                border-radius: 10px;
                display: block;
                margin: 0 auto;
            }
            .info {
                font-size: 1rem;
                color: #6c757d;
                margin-top: 10px;
            }
            .spec-title {
                font-weight: bold;
                color: #212529;
            }
            .btn-back {
                display: block;
                margin: 20px auto;
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s;
            }
            .btn-back:hover {
                background-color: #0056b3;
            }
            @media (max-width: 768px) {
                .row {
                    flex-direction: column;
                }
                img {
                    margin-bottom: 20px;
                }
            }
        </style>
        <title>รายละเอียดสินค้า</title>
    </head>
    <body>
        <h1 class="text-center my-4">CS MSU Phone Shop 2/2567</h1>

        <div class="container">
            <?php
            include "data.php";

            $id = $_GET['id'];
            $phone = $_SESSION['phones'][$id - 1];

            echo "
                <h1>{$phone->model}</h1>
                <div class='row d-flex align-items-center'>
                    <!-- คอลัมน์สำหรับรูปภาพ -->
                    <div class='col-md-4 text-center'>
                        <img src='{$phone->image}' alt='รูปภาพ {$phone->model}'>
                    </div>
                    <!-- คอลัมน์สำหรับข้อมูล -->
                    <div class='col-md-8'>
                        <p class='info'><span class='spec-title'>ราคา:</span> {$phone->price} บาท</p>
                        <p class='info'><span class='spec-title'>CPU:</span> {$phone->cpu}</p>
                        <p class='info'><span class='spec-title'>RAM:</span> {$phone->ram}</p>
                        <p class='info'><span class='spec-title'>กล้อง:</span> {$phone->camera}</p>
                        <p class='info'><span class='spec-title'>จอภาพ:</span> {$phone->screen}</p>
                        <p class='info'><span class='spec-title'>ขนาด:</span> {$phone->size}</p>
                        <p class='info'><span class='spec-title'>แบตเตอรี่:</span> {$phone->battery}</p>
                        <p class='info'><span class='spec-title'>วิดีโอ:</span> {$phone->image_video}</p>
                    </div>
                </div>
                <a href='index.php' class='btn btn-back'>ย้อนกลับ</a>
            ";
            ?>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
