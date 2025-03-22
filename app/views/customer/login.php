<?php require_once 'app/views/shares/header.php'; ?>

<div class="container">
    <h2>Đăng nhập</h2>
    <!-- Hiển thị thông báo lỗi (nếu có) -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']); // Xóa luôn lỗi sau khi hiển thị
            ?>
        </div>
    <?php endif; ?>

    <form action="/WebQuanLySpa/Customer/handleLogin" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                required 
                placeholder="Nhập email của bạn">
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input 
                type="password" 
                class="form-control" 
                id="password" 
                name="password" 
                required 
                placeholder="Nhập mật khẩu">
        </div>

        <button type="submit" class="btn btn-primary">Đăng nhập</button>
    </form>
</div>

<?php require_once 'app/views/shares/footer.php'; ?>
