<?php
class KhachhangController {
    // Hiển thị form đăng nhập
    public function login() {
        require_once 'app/views/khachhang/login.php';
    }

    // Hiển thị form đăng ký
    public function register() {
        require_once 'app/views/khachhang/register.php';
    }

    // Trang hồ sơ (Profile)
    public function profile() {
        require_once 'app/views/khachhang/profile.php';
    }

    public function editProfile() {
        require_once 'app/views/khachhang/editProfile.php';
    }

    // Trang đặt lịch (nếu có)
    public function datLich() {
        require_once 'app/views/khachhang/datlich.php';
    }

    // Trang thanh toán (nếu có)
    public function thanhToan() {
        require_once 'app/views/khachhang/thanhtoan.php';
    }

    // Trang đánh giá (nếu có)
    public function danhGia() {
        require_once 'app/views/khachhang/danhgia.php';
    }

    // Phương thức đăng xuất
    public function logout() {
        session_start();
        // Xóa tất cả các session
        session_unset();
        // Hủy session
        session_destroy();
        
        // Chuyển hướng về trang đăng nhập hoặc trang chủ
        header("Location: /WebQuanLySpa"); // Bạn có thể thay đổi địa chỉ trang này nếu cần
        exit();
    }


}