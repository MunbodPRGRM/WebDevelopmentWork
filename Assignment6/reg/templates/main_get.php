<main class="container">
    <div class="welcome-section">
        <?php
        $conn = getConnection();
        $sql = 'select * from students where student_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $_SESSION['student_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $name = $row['first_name'] . ' ' . $row['last_name'];
        ?>
        <div class="row">
            <div class="col-md-8">
                <div class="student-info">
                    <h1>สวัสดี คุณ <?php echo $name; ?></h1>
                    <p class="lead">ยินดีต้อนรับกลับมาที่ระบบลงทะเบียนเรียน</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-user-graduate fa-4x text-primary mb-3"></i>
                        <h5 class="card-title">รหัสนักศึกษา</h5>
                        <p class="card-text"><?php echo $_SESSION['student_id']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>