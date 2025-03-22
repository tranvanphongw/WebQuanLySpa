<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Spa Management</title>
    <!-- Link CSS Bootstrap 4 -->
    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    >

    <link rel="stylesheet" href="public/css/style.css">

    <!-- Bạn cũng có thể thêm file CSS riêng của mình nếu muốn -->
    <!-- <link rel="stylesheet" href="/WebQuanLySpa/public/css/style.css"> -->
</head>
<body>
    <!-- Bắt đầu Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/WebQuanLySpa/">
            Spa Management
        </a>
        <button 
            class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarNav" 
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menu phía bên phải -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <!-- Link về trang chủ (HomeController/index) -->
                    <a class="nav-link" href="/WebQuanLySpa">
                        Trang chủ
                    </a>
                </li>
                <?php if (isset($_SESSION['customer_id'])): ?>
        <!-- Nếu đã đăng nhập -->
        <li class="nav-item dropdown">
            <a 
                class="nav-link dropdown-toggle" 
                href="#" 
                id="userDropdown" 
                role="button" 
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false"
            >
                <!-- Hiển thị tên người dùng -->
                <?php echo $_SESSION['customer_name']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <!-- Link đến trang hồ sơ -->
                <a class="dropdown-item" href="/WebQuanLySpa/Customer/profile">
                    Hồ sơ
                </a>
                <!-- Link đăng xuất -->
                <a class="dropdown-item" href="/WebQuanLySpa/Customer/logout">
                    Đăng xuất
                </a>
            </div>
        </li>
    <?php else: ?>
        <!-- Nếu chưa đăng nhập -->
        <li class="nav-item">
            <a class="nav-link" href="/WebQuanLySpa/Customer/login">
                Đăng nhập
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/WebQuanLySpa/Customer/register">
                Đăng ký
            </a>
        </li>
    <?php endif; ?>

                <!-- Thêm các menu khác nếu cần, ví dụ: Dịch vụ, Liên hệ, ... -->
            </ul>
        </div>
    </nav>
    <!-- Kết thúc Navbar -->

    <!-- Bạn có thể thêm banner, slide, hoặc jumbotron nếu muốn -->
    <!--
    <div class="jumbotron text-center">
        <h1>Chào mừng đến với Spa Management</h1>
        <p>Giới thiệu ngắn về spa của bạn</p>
    </div>
    -->
