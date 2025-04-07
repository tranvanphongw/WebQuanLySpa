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
    <link rel="stylesheet" href="/WebQuanLySpa/public/css/style.css">

</head>
<body>
    <!-- Bắt đầu Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/WebQuanLySpa/">Spa Management</a>
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
            <ul class="navbar-nav mx-auto"> <!-- Sử dụng mx-auto để căn giữa các mục trong navbar -->
                <li class="nav-item">
                    <a class="nav-link" href="/WebQuanLySpa">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WebQuanLySpa/uu-dai">Ưu đãi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WebQuanLySpa/dich-vu">Dịch vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WebQuanLySpa/cong-nghe">Công nghệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WebQuanLySpa/co-so">Cơ sở</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/WebQuanLySpa/dat-lich">Đặt lịch</a>
                </li>
            </ul>

            <!-- Nếu người dùng đã đăng nhập, hiển thị menu quản lý tài khoản -->
            <?php if (isset($_SESSION['customer_id'])): ?>
                <ul class="navbar-nav ml-auto">
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
                            <!-- Hiển thị icon người dùng -->
                            <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/WebQuanLySpa/khachhang/profile">Hồ sơ</a>
                            <a class="dropdown-item" href="/WebQuanLySpa/khachhang/logout">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            <?php else: ?>
                <!-- Nếu người dùng chưa đăng nhập, chỉ hiển thị nút đăng nhập -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/WebQuanLySpa/khachhang/login">Đăng nhập</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
    <!-- Kết thúc Navbar -->

    <!-- Bao gồm các script như Bootstrap JS, jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Icon Font Awesome (Dùng cho icon người dùng) -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>


