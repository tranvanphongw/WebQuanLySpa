<?php require_once 'app/views/shares/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Nhóm Dịch Vụ</title>
    <link rel="stylesheet" href="/WebQuanLySpa/public/css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #0c4176;
            margin: 40px 0 20px;
            font-size: 2rem;
        }

        ul {
            list-style-type: none;
            padding: 0;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        li {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        li:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        li h2 {
            color: #0c4176;
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        li p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 8px;
        }

        li p strong {
            color: #ff6600;
        }

        li img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <h1>Danh Sách Nhóm Dịch Vụ</h1>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li>
                <h2><?php echo $category['TEN']; ?></h2>
                <p><?php echo $category['MOTA']; ?></p>
                <p><strong>Thời gian:</strong> <?php echo $category['THOIGIANTHUCHIEN']; ?> phút</p>
                <p><strong>Giá:</strong> <?php echo number_format($category['GIATIEN'], 0, ',', '.'); ?> VND</p>
                <img src="/WebQuanLySpa/public/uploads/<?php echo $category['HINHANH']; ?>" alt="<?php echo $category['TEN']; ?>">
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>