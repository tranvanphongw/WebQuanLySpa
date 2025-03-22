<?php require_once 'app/views/shares/header.php'; ?>

<div class="container" style="margin-top: 50px;">
    <h2>Hồ sơ của bạn</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID Khách hàng:</strong> <?php echo $_SESSION['customer_id']; ?></p>
            <p><strong>Tên:</strong> <?php echo $_SESSION['customer_name']; ?></p>
            <!-- Nếu bạn lưu email vào session, bạn có thể hiển thị ở đây -->
            <?php if (isset($customer['email'])): ?>
                <p><strong>Email:</strong> <?php echo $customer['email']; ?></p>
            <?php endif; ?>

            <!-- Thêm nút chỉnh sửa nếu muốn -->
             <a href="/WebQuanLySpa/Customer/editProfile" class="btn btn-primary">Chỉnh sửa hồ sơ</a> 
        </div>
    </div>
</div>

<?php require_once 'app/views/shares/footer.php'; ?>
