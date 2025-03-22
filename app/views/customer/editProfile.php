<?php require_once 'app/views/shares/header.php'; ?>

<div class="container" style="margin-top: 50px;">
    <h2>Chỉnh sửa hồ sơ</h2>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>

    <form action="/WebQuanLySpa/Customer/updateProfile" method="POST">
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input 
                type="text" 
                class="form-control" 
                id="name" 
                name="name" 
                value="<?php echo $customer['name'] ?? ''; ?>" 
                required
            >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email"
                value="<?php echo $customer['email'] ?? ''; ?>"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<?php require_once 'app/views/shares/footer.php'; ?>
