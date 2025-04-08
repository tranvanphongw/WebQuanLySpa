<?php include_once 'app/views/shares/header.php'; ?> 

<style>
    .staff-card-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        object-position: top center;
        border-radius: 0.75rem 0.75rem 0 0;
    }
    .rating-stars {
        color: #ffc107;
        font-size: 1rem;
        letter-spacing: 2px;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4">Danh sách nhân viên</h2>
    <div class="row">
        <?php foreach ($nhanviens as $nv): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm rounded-4 text-center">
                    <img src="/WebQuanLySpa/public/uploads/<?php echo $nv['HINHANH']; ?>" 
                         class="card-img-top staff-card-img"
                         alt="<?php echo $nv['TEN']; ?>">

                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"><?php echo $nv['TEN']; ?></h5>

                        <?php if (isset($nv['DCHI'])): ?>
                            <p class="card-text mb-1">
                                <strong>📍 Địa chỉ:</strong> <?php echo $nv['DCHI']; ?>
                            </p>
                        <?php endif; ?>

                        <?php if (isset($nv['DTHOAI'])): ?>
                            <p class="card-text mb-1">
                                <strong>📞 SĐT:</strong> <?php echo $nv['DTHOAI']; ?>
                            </p>
                        <?php endif; ?>

                        <p class="card-text rating-stars mb-0">
                            <?php
                                $full = floor($nv['DIEMDANHGIA']);
                                $half = ($nv['DIEMDANHGIA'] - $full) >= 0.5;
                                for ($i = 0; $i < $full; $i++) echo '★';
                                if ($half) echo '☆';
                                for ($i = $full + $half; $i < 5; $i++) echo '✩';
                            ?>
                            <span style="color: #555; font-size: 0.9rem;">(<?php echo $nv['DIEMDANHGIA']; ?>/5)</span>
                        </p>

                        <!-- Nút mở form đánh giá -->
                        <button class="btn btn-sm btn-outline-primary mt-2" onclick="toggleForm(<?= $nv['MANV'] ?>)">+ Gửi đánh giá</button>

                        <!-- Form đánh giá ẩn -->
                        <div class="card mt-3 p-3" id="form-<?= $nv['MANV'] ?>" style="display: none; background-color: #f9f9f9;">
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
                            <button class="btn btn-sm btn-success w-100" onclick="guiDanhGia(<?= $nv['MANV'] ?>)">Gửi</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
function toggleForm(manv) {
    const form = document.getElementById(`form-${manv}`);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}

function guiDanhGia(manv) {
    const sosao = document.getElementById(`sosao-${manv}`).value;
    const binhluan = document.getElementById(`binhluan-${manv}`).value;
    const token = localStorage.getItem('token');

    console.log("Token gửi đi:", token);

    if (!token) {
        alert("Bạn chưa đăng nhập hoặc thiếu token!");
        return;
    }

    fetch('/WebQuanLySpa/api/danhgia/add-danhgia.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        },
        body: JSON.stringify({ MANV: manv, SOSAO: sosao, BINHLUAN: binhluan })
    })
    .then(res => {
        if (!res.ok) throw new Error("Lỗi mạng hoặc token không hợp lệ");
        return res.json();
    })
    .then(data => {
        alert(data.message);
        if (data.status === 'success') {
            document.getElementById(`form-${manv}`).style.display = 'none';
            location.reload();
        }
    })
    .catch(error => {
        console.error("Lỗi fetch:", error);
        alert("Gửi đánh giá thất bại hoặc token không hợp lệ.");
    });
}
</script>

<?php include_once 'app/views/shares/footer.php'; ?>