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

                        <p class="card-text mb-1">
                            <strong>Địa chỉ:</strong> <?php echo $nv['DIACHI']; ?>
                        </p>
                        <p class="card-text mb-1">
                            <strong>SĐT:</strong> <?php echo $nv['SDT']; ?>
                        </p>

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
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once 'app/views/shares/footer.php'; ?>
