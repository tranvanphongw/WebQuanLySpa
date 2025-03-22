<?php
class CustomerModel {
    private $conn;

    public function __construct() {
        // Kết nối DB
        require_once 'app/config/database.php';
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Lấy thông tin khách hàng theo email (để kiểm tra đăng nhập hoặc kiểm tra tồn tại)
    public function getCustomerByEmail($email) {
        $sql = "SELECT * FROM customers WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ================== Tạo khách hàng mới ==================
    public function createCustomer($name, $email, $hashedPassword) {
        try {
            $sql = "INSERT INTO customers (name, email, password) 
                    VALUES (:name, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            // Lấy ID vừa được thêm nếu cần (ví dụ: return để kiểm tra thành công)
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            // Xử lý lỗi nếu cần, ví dụ: ghi log, hiển thị thông báo
            return false;
        }
    }

    public function getCustomerById($id) {
        $sql = "SELECT * FROM customers WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateCustomer($id, $name, $email) {
        try {
            $sql = "UPDATE customers SET name = :name, email = :email WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            return $stmt->execute(); // true/false
        } catch (PDOException $e) {
            return false;
        }
    }
    


}
