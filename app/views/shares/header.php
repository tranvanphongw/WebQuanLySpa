<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Spa Management</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- CSS trực tiếp để format đẹp navbar -->
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #ffffff;
      padding: 12px 30px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.1rem;
      color: #0c4176 !important;
    }

    .navbar-nav .nav-item {
      margin: 0 6px;
    }

    .navbar-nav .nav-link {
      background-color: transparent;
      padding: 6px 16px;
      border-radius: 12px;
      font-weight: 500;
      color: #333 !important;
      transition: all 0.3s ease;
      border: 1px solid transparent;
      box-shadow: none;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
      background-color: #007bff;
      color: #ffffff !important;
      border-color: #007bff;
    }

    .dropdown-menu {
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      border: none;
      min-width: 150px;
      padding: 10px 0;
    }

    .dropdown-item {
      padding: 8px 20px;
      font-size: 0.95rem;
      transition: background-color 0.2s ease;
    }

    .dropdown-item:hover {
      background-color: #f0f0f0;
    }
  </style>
</head>

<body>
  <!-- Bắt đầu Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="/WebQuanLySpa/">Mayu Japanese Esthetic Spa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa">Trang chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/uudai">Ưu đãi</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/dichvu">Dịch vụ</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/cong-nghe">Công nghệ</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/coso">Cơ sở</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/nhanvien">Nhân viên</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/datlich">Đặt lịch</a></li>
      </ul>

      <!-- Dropdown user -->
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['customer_id'])): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i> <?php echo $_SESSION['customer_name']; ?>
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

  <!-- JS scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <script>
    $(document).ready(function () {
      $('#userDropdown').on('click', function (e) {
        var $el = $(this).next('.dropdown-menu');
        var isVisible = $el.is(':visible');
        $('.dropdown-menu').hide();
        if (!isVisible) $el.toggle();
      });

      $(document).click(function (e) {
        if (!$(e.target).closest('.dropdown').length) {
          $('.dropdown-menu').hide();
        }
      });
    });
  </script>
</body>
</html>
