<?php
class CustomerController {
    // Hiển thị form đăng nhập
    public function login() {
        require_once 'app/views/customer/login.php';
    }

    // Xử lý dữ liệu đăng nhập
    public function handleLogin() {
        // Lấy dữ liệu từ form
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Gọi model để kiểm tra thông tin
        require_once 'app/models/CustomerModel.php';
        $customerModel = new CustomerModel();
        $customer = $customerModel->getCustomerByEmail($email);

        if ($customer) {
            // Kiểm tra password (giả sử DB đã hash)
            if (password_verify($password, $customer['password'])) {
                // Đăng nhập thành công, lưu session
                $_SESSION['customer_id'] = $customer['id'];
                $_SESSION['customer_name'] = $customer['name'];

                // Chuyển hướng về trang chủ
                header('Location: /WebQuanLySpa/'); 
                exit();
            } else {
                // Sai mật khẩu
                $_SESSION['error'] = "Mật khẩu không đúng!";
                header('Location: /WebQuanLySpa/Customer/login');
                exit();
            }
        } else {
            // Không tìm thấy email
            $_SESSION['error'] = "Email không tồn tại!";
            header('Location: /WebQuanLySpa/Customer/login');
            exit();
        }
    }

    // Đăng xuất
    public function logout() {
        session_destroy();
        header('Location: /WebQuanLySpa/');
        exit();
    }

    // ===================  ĐĂNG KÝ ===================

    // Hiển thị form đăng ký
    public function register() {
        require_once 'app/views/customer/register.php';
    }

    // Xử lý dữ liệu đăng ký
    public function handleRegister() {
        // 1. Lấy dữ liệu từ form
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // 2. Kiểm tra dữ liệu
        if (empty($name) || empty($email) || empty($password)) {
            $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin.";
            header('Location: /WebQuanLySpa/Customer/register');
            exit();
        }
        if ($password !== $confirmPassword) {
            $_SESSION['error'] = "Mật khẩu xác nhận không khớp.";
            header('Location: /WebQuanLySpa/Customer/register');
            exit();
        }

        // 3. Gọi model để kiểm tra email đã tồn tại?
        require_once 'app/models/CustomerModel.php';
        $customerModel = new CustomerModel();
        $existingCustomer = $customerModel->getCustomerByEmail($email);

        if ($existingCustomer) {
            $_SESSION['error'] = "Email đã được sử dụng!";
            header('Location: /WebQuanLySpa/Customer/register');
            exit();
        }

        // 4. Mã hóa password (hash)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // 5. Tạo user mới trong DB
        $newCustomerId = $customerModel->createCustomer($name, $email, $hashedPassword);

        if ($newCustomerId) {
            // Đăng ký thành công
            $_SESSION['success'] = "Đăng ký thành công! Hãy đăng nhập.";
            header('Location: /WebQuanLySpa/Customer/login');
            exit();
        } else {
            // Thất bại do lỗi DB hoặc lý do khác
            $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại.";
            header('Location: /WebQuanLySpa/Customer/register');
            exit();
        }
    }

        // Trang hồ sơ (Profile)
        public function profile() {
            if (!isset($_SESSION['customer_id'])) {
                header('Location: /WebQuanLySpa/Customer/login');
                exit();
            }
        
            require_once 'app/models/CustomerModel.php';
            $customerModel = new CustomerModel();
            $customer = $customerModel->getCustomerById($_SESSION['customer_id']);
        
            // Sau đó truyền $customer sang view
            require_once 'app/views/customer/profile.php';
        }
        

    public function editProfile() {
        if (!isset($_SESSION['customer_id'])) {
            header('Location: /WebQuanLySpa/Customer/login');
            exit();
        }
    
        // Gọi model lấy thông tin mới nhất từ DB
        require_once 'app/models/CustomerModel.php';
        $customerModel = new CustomerModel();
        $customer = $customerModel->getCustomerById($_SESSION['customer_id']);
    
        require_once 'app/views/customer/editProfile.php';
    }
    
    public function updateProfile() {
        if (!isset($_SESSION['customer_id'])) {
            header('Location: /WebQuanLySpa/Customer/login');
            exit();
        }
    
        // Lấy dữ liệu form
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        // v.v. ...
    
        // Gọi model cập nhật DB
        require_once 'app/models/CustomerModel.php';
        $customerModel = new CustomerModel();
        $result = $customerModel->updateCustomer($_SESSION['customer_id'], $name, $email);
    
        if ($result) {
            // Cập nhật session
            $_SESSION['customer_name'] = $name;
            $_SESSION['customer_email'] = $email;
            
            $_SESSION['success'] = "Cập nhật hồ sơ thành công!";
            header('Location: /WebQuanLySpa/Customer/profile');
            exit();
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại.";
            header('Location: /WebQuanLySpa/Customer/editProfile');
            exit();
        }
    }
    

}
