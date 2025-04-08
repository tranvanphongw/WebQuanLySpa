<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dịch Vụ</title>
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
            font-size: 2rem;
            margin: 40px 0 30px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0 auto;
            max-width: 1200px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        li {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
            text-align: center;
        }

        li:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 24px rgba(0,0,0,0.12);
        }

        li h2 {
            color: #0c4176;
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        li p {
            font-size: 1rem;
            margin-bottom: 6px;
            color: #555;
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
    <h1>Danh Sách Dịch Vụ</h1>
    <ul>
        <?php foreach ($services as $service): ?>
            <li>
                <h2><?php echo $service['TEN']; ?></h2>
                <p><?php echo $service['MOTA']; ?></p>
                <p><strong>Thời gian:</strong> <?php echo $service['THOIGIANTHUCHIEN']; ?> phút</p>
                <p><strong>Giá:</strong> <?php echo number_format($service['GIATIEN'], 0, ',', '.'); ?> VND</p>
                <img src="/WebQuanLySpa/public/uploads/<?php echo $service['HINHANH']; ?>" alt="<?php echo $service['TEN']; ?>">
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
