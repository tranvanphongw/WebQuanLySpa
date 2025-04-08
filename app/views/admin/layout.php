<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Trị Spa</title>
    <link rel="stylesheet" href="/WebQuanLySpa/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/WebQuanLySpa/public/css/admin.css">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h4 class="text-center">Spa Admin</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="/WebQuanLySpa/admin/dashboard" class="nav-link text-white">Tổng quan</a></li>
                <li class="nav-item"><a href="/WebQuanLySpa/admin/nhanvien" class="nav-link text-white">Quản lý nhân viên</a></li>
                <li class="nav-item"><a href="/WebQuanLySpa/admin/dichvu" class="nav-link text-white">Quản lý dịch vụ</a></li>
                <li class="nav-item"><a href="/WebQuanLySpa/admin/lichdat" class="nav-link text-white">Lịch đặt</a></li>
                <li class="nav-item"><a href="/WebQuanLySpa/admin/baocao" class="nav-link text-white">Báo cáo</a></li>
            </ul>
        </nav>

        <!-- Nội dung chính -->
        <div class="flex-grow-1 p-4">
            <?php include_once $view; ?>
        </div>
    </div>
</body>
</html>
