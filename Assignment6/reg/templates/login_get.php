<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-0"><i class="fas fa-user-circle me-2"></i>เข้าสู่ระบบ</h1>
        </div>
        <div class="card-body p-4">
            <form action="/login" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary py-2">
                        <i class="fas fa-sign-in-alt me-2"></i>เข้าสู่ระบบ
                    </button>
                </div>
            </form>

            <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>' . $_SESSION['message'] . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                unset($_SESSION['message']);
            }
            ?>
        </div>
    </div>
</div>