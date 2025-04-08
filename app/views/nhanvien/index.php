<?php require_once 'app/views/shares/header.php'; ?>


<div class="container mt-4" style="background-color: rgba(255,255,255,0.92); border-radius: 16px; padding: 24px;">
    <h2 class="text-center fw-bold mb-4 text-primary">🌟 Danh sách nhân viên 🌟</h2>

    <div class="row g-4">
        <?php foreach ($nhanviens as $nv): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 rounded-4 h-100">
                    <div class="card-body d-flex flex-column">
                        <!-- Hình ảnh -->
                        <div class="bg-white border rounded-4 overflow-hidden mb-3 d-flex align-items-center justify-content-center" style="width: 100%; height: 180px;">
                            <img src="/WebQuanLySpa/public/uploads/<?= htmlspecialchars($nv['HINHANH']) ?>"
                                alt="Ảnh <?= htmlspecialchars($nv['TEN']) ?>"
                                class="img-fluid"
                                style="max-width: 100%; max-height: 100%; object-fit: cover;">
                        </div>

                        <!-- Thông tin nhân viên -->
                        <h5 class="card-title text-primary fw-bold mb-2 text-center"><?= htmlspecialchars($nv['TEN']) ?></h5>
                        <ul class="list-unstyled small mb-2 d-flex flex-column gap-2">
                            <li class="card p-2 shadow-sm" style="background-color: #f0f8ff;"><strong>📍 Địa chỉ:</strong> <?= htmlspecialchars($nv['DCHI']) ?></li>
                            <li class="card p-2 shadow-sm" style="background-color: #fffaf0;"><strong>📞 Điện thoại:</strong> <?= htmlspecialchars($nv['DTHOAI']) ?></li>
                            <li class="card p-2 shadow-sm" style="background-color: #fffaf0;"><strong>⭐ Đánh giá:</strong> <?= is_null($nv['DIEMTRUNGBINH']) ? 'Chưa có' : htmlspecialchars($nv['DIEMTRUNGBINH']) ?> ⭐</li>
                        </ul>

                        <button class="btn btn-sm btn-outline-primary w-100" onclick="toggleForm(<?= $nv['MANV'] ?>)">+ Gửi đánh giá</button>

                        <!-- Form đánh giá -->
                        <div id="form-<?= $nv['MANV'] ?>" class="card p-3 mt-3 border shadow-sm" style="display: none; border-radius: 12px; background-color: #fdfdfd;">
                            <div class="form-group mb-2">
                                <label class="form-label small">Số sao:</label>
                                <select class="form-select form-select-sm" id="sosao-<?= $nv['MANV'] ?>">
                                    <option value="5">5 sao</option>
                                    <option value="4">4 sao</option>
                                    <option value="3">3 sao</option>
                                    <option value="2">2 sao</option>
                                    <option value="1">1 sao</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label class="form-label small">Bình luận:</label>
                                <textarea class="form-control form-control-sm" id="binhluan-<?= $nv['MANV'] ?>" rows="2" placeholder="Viết bình luận..."></textarea>
                            </div>
                            <button class="btn btn-sm btn-success w-100" onclick="guiDanhGia(<?= $nv['MANV'] ?>)">Gửi đánh giá</button>
                        </div>

                        <!-- Đánh giá từ khách hàng -->
                        <div class="mt-4">
                            <h6 class="text-primary">📢 Đánh giá từ khách hàng</h6>
                            <div id="danhgia-<?= $nv['MANV'] ?>">
                                <p class="text-muted">Đang tải đánh giá...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>

<script>
function toggleForm(manv) {
    const form = document.getElementById(`form-${manv}`);
    form.style.display = (form.style.display === 'none') ? 'block' : 'none';
}

function guiDanhGia(manv) {
    const sosao = document.getElementById(`sosao-${manv}`).value;
    const binhluan = document.getElementById(`binhluan-${manv}`).value;

    fetch('/WebQuanLySpa/api/danhgia/add-danhgia.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ MANV: manv, SOSAO: sosao, BINHLUAN: binhluan })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if (data.status === 'success') {
            document.getElementById(`form-${manv}`).style.display = 'none';
            loadDanhGia(manv);
            location.reload();
        }
    })
    .catch(() => alert("Lỗi gửi đánh giá."));
}

function loadDanhGia(manv) {
    const container = document.getElementById(`danhgia-${manv}`);
    container.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';

    fetch(`/WebQuanLySpa/api/danhgia/list-danhgia-by-nhanvien.php?MANV=${manv}`)
        .then(res => res.json())
        .then(data => {
            container.innerHTML = '';
            if (data.status === 'success' && data.data.length > 0) {
                data.data.forEach(dg => {
                    const review = document.createElement('div');
                    review.className = 'border rounded p-2 mb-2 bg-light';
                    review.innerHTML = `
                        <strong>${dg.TENKH}</strong> - 
                        <span class="text-warning">${'★'.repeat(dg.SOSAO)}${'☆'.repeat(5 - dg.SOSAO)}</span><br>
                        <small class="text-muted">${dg.NGAYDANHGIA}</small><br>
                        <p class="mb-0">${dg.BINHLUAN}</p>`;
                    container.appendChild(review);
                });
            } else {
                container.innerHTML = '<p class="text-muted">Chưa có đánh giá nào.</p>';
            }
        })
        .catch(() => {
            container.innerHTML = '<p class="text-danger">Lỗi tải đánh giá.</p>';
        });
}

document.addEventListener("DOMContentLoaded", () => {
    <?php foreach ($nhanviens as $nv): ?>
        loadDanhGia(<?= $nv['MANV'] ?>);
    <?php endforeach; ?>
});
</script>

<?php require_once 'app/views/shares/footer.php'; ?>
