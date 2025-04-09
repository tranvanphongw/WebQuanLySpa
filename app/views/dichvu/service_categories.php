<?php require_once 'app/views/shares/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Nhóm Dịch Vụ</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Cập nhật màu nền và kiểu chữ */
        body {
            background-color: rgb(182, 156, 130); /* Màu nền */
            font-family: 'Segoe UI', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Tiêu đề */
        h1 {
            text-align: center;
            color: #3b1f1f; /* Màu chữ cho tiêu đề */
            margin: 40px 0 20px;
            font-size: 2rem;
        }

        /* Tạo lưới cho danh sách dịch vụ */
        .row {
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Các thẻ dịch vụ */
        .service-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: white;
        }

        /* Hiệu ứng hover khi di chuột */
        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        /* Hình ảnh dịch vụ */
        .service-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 15px;
        }

        /* Tiêu đề của mỗi nhóm dịch vụ */
        .service-card h2 {
            color: #0c4176;
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        /* Mô tả dịch vụ */
        .service-card p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 8px;
        }

        /* Thời gian và giá dịch vụ */
        .service-card p strong {
            color: #ff6600;
        }

        /* Điều chỉnh các phần tử Bootstrap */
        .col-md-4 {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-5">Danh Sách Nhóm Dịch Vụ</h1>
        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-md-4">
                    <div class="service-card">
                        <h2><?php echo $category['TEN']; ?></h2>
                        <p><?php echo $category['MOTA']; ?></p>
                        <p><strong>Thời gian:</strong> <?php echo $category['THOIGIANTHUCHIEN']; ?> phút</p>
                        <p><strong>Giá:</strong> <?php echo number_format($category['GIATIEN'], 0, ',', '.'); ?> VND</p>
                        <img src="/WebQuanLySpa/public/uploads/<?php echo $category['HINHANH']; ?>" alt="<?php echo $category['TEN']; ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Thêm Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php require_once 'app/views/shares/footer.php'; ?>