<?php include_once 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2>Danh sách nhân viên</h2>
    <div class="row">
        <?php foreach ($nhanviens as $nv): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="/WebQuanLySpa/public/uploads/<?php echo $nv['HINHANH']; ?>" class="card-img-top" alt="<?php echo $nv['TEN']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nv['TEN']; ?></h5>
                        <p class="card-text">Chuyên môn: <?php echo $nv['CHUYENMON']; ?></p>
                        <p class="card-text">Đánh giá: <?php echo $nv['DIEMDANHGIA']; ?>/5</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once 'app/views/shares/footer.php'; ?>
