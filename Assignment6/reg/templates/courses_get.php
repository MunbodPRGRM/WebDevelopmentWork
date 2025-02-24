<?php

$courses = $data['courses'];

?>

<div class="main-content">
    <h2 class="mb-4"><i class="fas fa-book-open me-2"></i>รายวิชาที่เปิดให้ลงทะเบียน</h2>

    <div class="table-responsive">
        <table class="table table-hover course-table">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>อาจารย์ผู้สอน</th>
                    <th class="text-center">การดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><strong><?= $course['course_code'] ?></strong></td>
                        <td><?= $course['course_name'] ?></td>
                        <td><?= $course['instructor'] ?></td>
                        <td class="text-center">
                            <a href="/enroll?id=<?= $course['course_id'] ?>" class="btn btn-enroll" onclick="return confirmSubmission()">
                                <i class="fas fa-plus-circle me-1"></i> ลงทะเบียน
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmSubmission() {
        return confirm("Are you sure, you want to enroll this course?");
    }
</script>