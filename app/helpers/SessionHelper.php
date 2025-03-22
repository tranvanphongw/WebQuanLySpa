<?php
class SessionHelper {
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public static function remove($key) {
        unset($_SESSION[$key]);
    }

    public static function has($key) {
        return isset($_SESSION[$key]);
    }

    public static function isLoggedIn() {
        return isset($_SESSION['customer_id']);
    }

    public static function isAdmin() {
        // Ví dụ: kiểm tra cột 'role' = 'admin'
        return (isset($_SESSION['customer_id']) && 
                isset($_SESSION['role']) && 
                $_SESSION['role'] === 'admin');
    }
}
