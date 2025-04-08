<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dịch Vụ</title>
    <!-- Liên kết đến file CSS -->
    <link rel="stylesheet" href="/WebQuanLySpa/public/css/style.css">
</head>
<body>
    <h1>Danh Sách Dịch Vụ</h1>
    <ul>
        <?php foreach ($services as $service): ?>
            <li>
                <h2><?php echo $service['TEN']; ?></h2>
                <p><?php echo $service['MOTA']; ?></p>
                <p>Thời gian: <?php echo $service['THOIGIANTHUCHIEN']; ?> phút</p>
                <p>Giá: <?php echo number_format($service['GIATIEN'], 0, ',', '.'); ?> VND</p>
                <!-- Đảm bảo rằng hình ảnh nằm trong thư mục đúng -->
                <img src="/WebQuanLySpa/public/uploads/<?php echo $service['HINHANH']; ?>" alt="<?php echo $service['TEN']; ?>" />
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
