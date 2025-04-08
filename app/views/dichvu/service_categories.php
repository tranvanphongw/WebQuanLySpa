<?php require_once 'app/views/shares/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Nhóm Dịch Vụ</title>
    <!-- Liên kết đến file CSS -->
    <link rel="stylesheet" href="/WebQuanLySpa/public/css/style.css">
</head>
<body>

    <h1>Danh Sách Nhóm Dịch Vụ</h1>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li>
                <h2><?php echo $category['TEN']; ?></h2> <!-- Tên dịch vụ -->
                <p><?php echo $category['MOTA']; ?></p> <!-- Mô tả -->
                <p><strong>Thời gian:</strong> <?php echo $category['THOIGIANTHUCHIEN']; ?> phút</p>
                <p><strong>Giá:</strong> <?php echo number_format($category['GIATIEN'], 0, ',', '.'); ?> VND</p>
                <img src="/WebQuanLySpa/public/uploads/<?php echo $category['HINHANH']; ?>" alt="<?php echo $category['TEN']; ?>" />
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
