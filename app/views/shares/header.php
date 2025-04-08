<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Spa Management</title>
    <!-- Liên kết đến Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Liên kết đến style.css của bạn -->
    <link rel="stylesheet" href="/WebQuanLySpa/public/css/style.css">
</head>
<body>
    <!-- Bắt đầu Navbar -->

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="/WebQuanLySpa/">Mayu Japanese Esthetic Spa</a>
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
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="/WebQuanLySpa">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/WebQuanLySpa/uudai">Ưu đãi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/WebQuanLySpa/dichvu">Dịch vụ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/WebQuanLySpa/cong-nghe">Công nghệ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/WebQuanLySpa/coso">Cơ sở</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/WebQuanLySpa/nhanvien">Nhân viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/WebQuanLySpa/datlich">Đặt lịch</a>
            </li>
        </ul>

       
        <!-- Kiểm tra nếu người dùng đã đăng nhập -->
<ul class="navbar-nav ml-auto">
    <?php if (isset($_SESSION['customer_id'])): ?>
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
                <i class="fa fa-user"></i> 
                <!-- Hiển thị tên người dùng sau khi đăng nhập -->
                <?php echo $_SESSION['customer_name']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/WebQuanLySpa/khachhang/profile">Hồ sơ</a>
                <a class="dropdown-item" href="/WebQuanLySpa/khachhang/logout">Đăng xuất</a>
            </div>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="/WebQuanLySpa/khachhang/login">Đăng nhập</a>
        </li>
    <?php endif; ?>
</ul>

    </div>
</nav>


    <!-- Kết thúc Navbar -->

<!-- Liên kết jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Liên kết Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

<!-- Liên kết Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <!-- Thêm script của bạn ở đây -->
 <script>
    $(document).ready(function() {
        // Xử lý khi người dùng nhấp vào tên tài khoản để mở dropdown
        $('#userDropdown').on('click', function (e) {
            var $el = $(this).next('.dropdown-menu');
            var isVisible = $el.is(':visible');
            
            // Ẩn tất cả các dropdown trước đó
            $('.dropdown-menu').hide();

            // Nếu dropdown chưa mở, mở nó
            if (!isVisible) {
                $el.toggle();
            }
        });

        // Ẩn dropdown khi nhấp ra ngoài
        $(document).click(function (e) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').hide();
            }
        });
    });
    </script>


    <!-- Icon Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
