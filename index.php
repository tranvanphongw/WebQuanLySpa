<?php
session_start();
require_once 'app/helpers/SessionHelper.php';

// Lấy đường dẫn từ ?url=... hoặc từ mod_rewrite
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Mặc định: controller = HomeController, action = index
// Sửa lại dòng này:
$controllerName = !empty($url[0])
    ? str_replace('-', '', ucwords($url[0], '-')) . 'Controller'
    : 'HomeController';

$action = $url[1] ?? 'index';
$params = array_slice($url, 2);

// Kiểm tra file controller
$controllerPath = 'app/controllers/' . $controllerName . '.php';

if (!file_exists($controllerPath)) {
    http_response_code(404);
    die("❌ Controller <strong>$controllerName</strong> not found in <code>$controllerPath</code>.");
}

require_once $controllerPath;

// Kiểm tra class controller
if (!class_exists($controllerName)) {
    http_response_code(500);
    die("❌ Controller class <strong>$controllerName</strong> not declared.");
}

$controller = new $controllerName();

// Kiểm tra action
if (!method_exists($controller, $action)) {
    http_response_code(404);
    die("❌ Action <strong>$action</strong> not found in controller <strong>$controllerName</strong>.");
}

// Gọi hàm tương ứng
call_user_func_array([$controller, $action], $params);
