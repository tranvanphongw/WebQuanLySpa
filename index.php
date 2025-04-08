
<?php
session_start();
require_once 'app/helpers/SessionHelper.php';

// Lấy đường dẫn từ ?url=... hoặc từ mod_rewrite
$url = $_GET['url'] ?? ''; // Lấy URL từ query string (nếu có)
$url = rtrim($url, '/'); // Xóa ký tự / cuối cùng nếu có
$url = filter_var($url, FILTER_SANITIZE_URL); // Loại bỏ các ký tự đặc biệt
$url = explode('/', $url); // Chia đường dẫn thành mảng

// Mặc định: controller = HomeController, action = index
$controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
$action = $url[1] ?? 'index'; // Nếu không có action thì mặc định là 'index'
$params = array_slice($url, 2); // Các tham số còn lại

// Kiểm tra file controller
$controllerPath = 'app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerPath)) {
    http_response_code(404); // Trả về mã lỗi 404 nếu không tìm thấy controller
    die("❌ Controller <strong>$controllerName</strong> not found in <code>$controllerPath</code>.");
}

require_once $controllerPath;

// Kiểm tra class controller
if (!class_exists($controllerName)) {
    http_response_code(500); // Trả về lỗi 500 nếu class controller không tồn tại
    die("❌ Controller class <strong>$controllerName</strong> not declared.");
}

$controller = new $controllerName(); // Khởi tạo đối tượng controller

// Kiểm tra action (method) trong controller
if (!method_exists($controller, $action)) {
    http_response_code(404); // Trả về lỗi 404 nếu không tìm thấy action trong controller
    die("❌ Action <strong>$action</strong> not found in controller <strong>$controllerName</strong>.");
}



// Kiểm tra URL và gọi đúng controller
if ($url[0] == 'dichvu' && !isset($url[1])) {
    // Hiển thị danh sách nhóm dịch vụ
    $controller = new DichvuController();
    $controller->showServiceCategories();
    exit;
}

if ($url[0] == 'dichvu' && isset($url[1])) {
    // Hiển thị dịch vụ theo nhóm
    $categoryId = $url[1];
    $controller = new DichvuController();
    $controller->showServicesByCategory($categoryId);
    exit;
}



// Gọi hàm tương ứng với action
call_user_func_array([$controller, $action], $params);
