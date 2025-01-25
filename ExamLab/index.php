<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- เพิ่ม Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            td {
                text-align: center;
                border: 1px solid #ddd;
                padding: 15px;
                vertical-align: top;
                transition: background-color 0.3s, transform 0.3s;
                cursor: pointer;
                background-color: #fff;
            }
            td:hover {
                transform: scale(1.02);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
            img {
                max-width: 100%;
                height: auto;
                border-radius: 10px;
            }
            .highlight {
                background-color: #ffeeba;
            }
            .btn-compare {
                margin-top: 20px;
                background-color: #007bff;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s;
            }
            .btn-compare:hover {
                background-color: #0056b3;
            }
            .tooltip-container {
                position: relative;
                display: inline-block;
            }
            .tooltip-box {
                display: none;
                position: absolute;
                top: 50%;
                left: 110%;
                transform: translateY(-50%);
                background-color: #333;
                color: #fff;
                text-align: left;
                padding: 10px;
                border-radius: 5px;
                font-size: 14px;
                width: 200px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                z-index: 100;
            }
            .tooltip-container:hover .tooltip-box {
                display: block;
            }
        </style>
        <title>CS MSU Phone Shop</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center my-4">CS MSU Phone Shop 2/2567</h1>

            <form method="post" action="compare.php">
                <div class="text-center">
                    <button type="submit" class="btn btn-compare">เปรียบเทียบ</button>
                </div>

                <table class="mt-4">
                    <?php
                    include "data.php";

                    $counter = 0;

                    foreach ($_SESSION['phones'] as $phone) {
                        if ($counter % 3 == 0) {
                            echo "<tr>";
                        }

                        echo "
                            <td>
                                <h5 class='fw-bold'>{$phone->model}</h5>
                                <div class='tooltip-container'>
                                    <a href='detail.php?id={$phone->id}' class='d-block mb-2'>
                                        <img src='{$phone->image}' width='200'>
                                    </a>
                                    <div class='tooltip-box'>
                                        <strong>{$phone->model}</strong><br>
                                        <strong>ราคา:</strong> {$phone->price} บาท<br>
                                        <strong>CPU:</strong> {$phone->cpu}<br>
                                        <strong>Ram:</strong> {$phone->ram}<br>
                                        <strong>ขนาดจอ:</strong> {$phone->size}<br>
                                    </div>
                                </div>
                                <p class='text-success fw-bold'>ราคา: {$phone->price} บาท</p>
                                <label class='form-check-label'>
                                    <input type='checkbox' name='selected_ids[]' value='{$phone->id}' class='form-check-input highlight-checkbox'>
                                    เลือกรายการนี้
                                </label>
                            </td>
                        ";

                        $counter++;

                        if ($counter % 3 == 0) {
                            echo "</tr>";
                        }
                    }

                    if ($counter % 3 != 0) {
                        $remainingCols = 3 - ($counter % 3);
                        for ($i = 0; $i < $remainingCols; $i++) {
                            echo "<td></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
            </form>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            const checkboxes = document.querySelectorAll('.highlight-checkbox');
            const maxSelection = 3;

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const checkedCount = document.querySelectorAll('.highlight-checkbox:checked').length;

                    if (checkedCount >= maxSelection) {
                        checkboxes.forEach(box => {
                            if (!box.checked) {
                                box.disabled = true;
                            }
                        });
                    } else {
                        checkboxes.forEach(box => {
                            box.disabled = false;
                        });
                    }

                    const td = checkbox.closest('td');
                    if (checkbox.checked) {
                        td.classList.add('highlight');
                    } else {
                        td.classList.remove('highlight');
                    }
                });
            });
        </script>
    </body>
</html>
