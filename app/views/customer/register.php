<?php require_once 'app/views/shares/header.php'; ?>

<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Đăng ký</h2>

            <!-- Hiển thị thông báo lỗi (nếu có) -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']); 
                    ?>
                </div>
            <?php endif; ?>

            <!-- Hiển thị thông báo thành công (nếu có) -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']); 
                    ?>
                </div>
            <?php endif; ?>

            <form action="/WebQuanLySpa/Customer/handleRegister" method="POST">
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control" 
                        required 
                        placeholder="Nhập họ tên"
                    >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="form-control" 
                        required 
                        placeholder="Nhập email"
                    >
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control" 
                        required 
                        placeholder="Nhập mật khẩu"
                    >
                </div>
                <div class="form-group">
                    <label for="confirm_password">Xác nhận mật khẩu</label>
                    <input 
                        type="password" 
                        name="confirm_password" 
                        id="confirm_password" 
                        class="form-control" 
                        required 
                        placeholder="Nhập lại mật khẩu"
                    >
                </div>

                <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
            </form>

            <p class="mt-3">
                Đã có tài khoản? 
                <a href="/WebQuanLySpa/Customer/login">Đăng nhập</a>
            </p>
        </div>
    </div>
</div>

<?php require_once 'app/views/shares/footer.php'; ?>
