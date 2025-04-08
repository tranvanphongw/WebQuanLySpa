<div class="container my-5">
    <?php if ($nhanvien): ?>
        <div class="card shadow">
            <div class="row no-gutters">
                <div class="col-md-4 text-center p-4">
                    <?php if ($nhanvien['HINHANH']): ?>
                        <img src="/WebQuanLySpa/public/uploads/<?= htmlspecialchars($nhanvien['HINHANH']) ?>" 
                             alt="Ảnh nhân viên" 
                             class="img-fluid rounded-circle border"
                             style="width: 200px; height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <div class="text-muted mt-5">Chưa có ảnh</div>
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title mb-3"><?= htmlspecialchars($nhanvien['TEN']) ?></h3>
                        <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($nhanvien['DCHI']) ?></p>
                        <p><strong>Điện thoại:</strong> <?= htmlspecialchars($nhanvien['DTHOAI']) ?></p>
                        <p><strong>Chuyên môn:</strong> <?= htmlspecialchars($nhanvien['CHUYENMON']) ?></p>
                        <p><strong>Đánh giá:</strong> <?= htmlspecialchars($nhanvien['DIEMDANHGIA']) ?> / 5</p>
                        <a href="/WebQuanLySpa/nhanvien" class="btn btn-outline-primary mt-3">
                            ← Quay lại danh sách nhân viên
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger text-center">Không tìm thấy nhân viên.</div>
    <?php endif; ?>
</div>
