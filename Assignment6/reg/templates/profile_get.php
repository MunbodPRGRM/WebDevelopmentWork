<section>
    <h2 class="mb-4"><i class="fas fa-id-card me-2"></i>ข้อมูลนักเรียน</h2>
    <div class="table-container">
        <table class="table table-striped table-hover">
            <tr>
                <th class="bg-light" width="30%">ชื่อ</th>
                <td><?= $data['result']['first_name'] ?></td>
            </tr>
            <tr>
                <th class="bg-light">นามสกุล</th>
                <td><?= $data['result']['last_name'] ?></td>
            </tr>
            <tr>
                <th class="bg-light">วันเกิด</th>
                <td><?= $data['result']['date_of_birth'] ?></td>
            </tr>
            <tr>
                <th class="bg-light">เบอร์โทรศัพท์</th>
                <td><?= $data['result']['phone_number'] ?></td>
            </tr>
        </table>
    </div>

    <h2 class="mb-4"><i class="fas fa-book-open me-2"></i>วิชาที่ลงทะเบียน</h2>
    <div class="table-container">
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>อาจารย์ผู้สอน</th>
                    <th>วันที่ลงทะเบียน</th>
                    <th class="text-center">การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['enrollments'] as $enrollment): ?>
                    <tr>
                        <td><?= $enrollment['course_code'] ?></td>
                        <td><?= $enrollment['course_name'] ?></td>
                        <td><?= $enrollment['instructor'] ?></td>
                        <td><?= $enrollment['enrollment_date'] ?></td>
                        <td class="text-center">
                            <a href="withdraw?id=<?= $enrollment['enrollment_id'] ?>" class="btn btn-sm btn-withdraw" onclick="return confirmSubmission()">
                                <i class="fas fa-times-circle me-1"></i> ถอนรายวิชา
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<script>
    function confirmSubmission() {
        return confirm("Are you sure, you want to withdraw this course?");
    }
</script>