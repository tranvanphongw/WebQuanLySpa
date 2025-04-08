<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Spa Management</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background-color: #fef9f5;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #ffffff;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      padding: 1rem 2rem;
      transition: top 0.4s ease-in-out, background-color 0.3s;
      z-index: 1000;
    }

    .navbar.header-hidden {
      top: -100px;
      position: fixed;
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.8rem;
      color: #b28c67;
      transition: color 0.3s;
    }

    .navbar-brand:hover {
      color: #a3754d;
    }

    .navbar-nav .nav-link {
      font-weight: 500;
      margin: 0 12px;
      color: #444 !important;
      transition: all 0.3s ease;
      position: relative;
    }

    .navbar-nav .nav-link::after {
      content: '';
      position: absolute;
      width: 0%;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: #b28c67;
      transition: width 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover::after {
      width: 100%;
    }

    .navbar-nav .nav-link:hover {
      color: #b28c67 !important;
    }

    .dropdown-menu {
      border: none;
      border-radius: 0.5rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
      font-weight: 500;
      transition: background-color 0.2s, color 0.2s;
    }

    .dropdown-item:hover {
      background-color: #f5f5f5;
      color: #b28c67;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="/WebQuanLySpa/">Spa Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa">Trang chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/uudai">Ưu đãi</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/dichvu">Dịch vụ</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/congnghe">Công nghệ</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/coso">Cơ sở</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/nhanvien">Nhân viên</a></li>
        <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/datlich">Đặt lịch</a></li>
      </ul>

      <?php if (isset($_SESSION['customer_id'])): ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="/WebQuanLySpa/khachhang/profile">Hồ sơ</a>
              <a class="dropdown-item" href="/WebQuanLySpa/khachhang/logout">Đăng xuất</a>
            </div>
          </li>
        </ul>
      <?php else: ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="/WebQuanLySpa/khachhang/login">Đăng nhập</a></li>
        </ul>
      <?php endif; ?>
    </div>
  </nav>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      let lastScroll = 0;
      const navbar = document.querySelector(".navbar");

      // Hiện navbar khi rê chuột gần đỉnh trang
      document.addEventListener("mousemove", (e) => {
        if (e.clientY < 50) {
          navbar.classList.remove("header-hidden");
        }
      });

      // Ẩn/hiện navbar theo cuộn
      window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll > lastScroll && currentScroll > 100) {
          navbar.classList.add("header-hidden");
        } else {
          navbar.classList.remove("header-hidden");
        }
        lastScroll = currentScroll;
      });
    });
  </script>
</body>
</html>
