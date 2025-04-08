<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Spa Management</title>
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background-color: #fff;
    }

    .navbar {
      background-color: #ffffff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      padding: 1rem 2rem;
    }

    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
      color: #b28c67;
    }

    .navbar-nav .nav-link {
      font-weight: 500;
      margin: 0 10px;
      color: #333 !important;
      transition: color 0.3s;
    }

    .navbar-nav .nav-link:hover {
      color: #b28c67 !important;
    }

    .dropdown-menu {
      border: none;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .dropdown-item:hover {
      background-color: #f9f9f9;
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
</body>
</html>
