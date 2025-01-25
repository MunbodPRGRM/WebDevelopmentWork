<?php
include "data.php";

if (!empty($_POST['selected_ids'])) {
    $selectedIds = $_POST['selected_ids']; // รับรายการ ID ที่ส่งมา
    $selectedPhones = [];

    // ค้นหารายการที่ตรงกับ ID ที่เลือก
    foreach ($_SESSION['phones'] as $phone) {
        if (in_array($phone->id, $selectedIds)) {
            $selectedPhones[] = $phone;
        }
    }
} else {
    echo "<p>คุณยังไม่ได้เลือกรายการใดๆ</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- เพิ่ม Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .compare-container {
                display: flex;
                justify-content: center;
                gap: 30px;
                margin-top: 30px;
                flex-wrap: wrap;
            }
            .phone-card {
                border: 1px solid #ddd;
                padding: 20px;
                text-align: center;
                width: 410px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                transition: box-shadow 0.3s ease-in-out;
            }
            .phone-card:hover {
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            }
            .phone-card img {
                max-width: 100%;
                height: auto;
                border-radius: 10px;
                margin-bottom: 15px;
            }
            .phone-card h4 {
                font-size: 1.25rem;
                margin-bottom: 10px;
            }
            .phone-card p {
                font-size: 0.95rem;
                margin: 5px 0;
            }
            .btn-back {
                margin-top: 30px;
                background-color: #007bff;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s;
                font-size: 1.1rem;
            }
            .btn-back:hover {
                background-color: #0056b3;
            }
        </style>
        <title>เปรียบเทียบสินค้า</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center my-5">เปรียบเทียบสินค้า</h1>

            <div class="compare-container">
                <?php foreach ($selectedPhones as $phone) { ?>
                    <div class="phone-card">
                        <h4><?php echo $phone->model; ?></h4>
                        <img src="<?php echo $phone->image; ?>" width="200" alt="Phone Image">
                        <p><strong>ราคา:</strong> <?php echo $phone->price; ?> บาท</p>
                        <p><strong>CPU:</strong> <?php echo $phone->cpu; ?></p>
                        <p><strong>RAM:</strong> <?php echo $phone->ram; ?></p>
                        <p><strong>กล้อง:</strong> <?php echo $phone->camera; ?></p>
                        <p><strong>จอภาพ:</strong> <?php echo $phone->screen; ?></p>
                        <p><strong>ขนาด:</strong> <?php echo $phone->size; ?></p>
                        <p><strong>แบตเตอรี่:</strong> <?php echo $phone->battery; ?></p>
                        <p><strong>วิดีโอ:</strong> <?php echo $phone->image_video; ?></p>
                    </div>
                <?php } ?>
            </div>

            <div class="text-center">
                <a href='index.php' class='btn btn-back'>ย้อนกลับ</a>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
