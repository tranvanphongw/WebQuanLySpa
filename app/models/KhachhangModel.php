<?php
class KhachhangModel {
    private $conn;

    public function __construct() {
        // Kết nối đến database
        require_once __DIR__ . '/../config/database.php';
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Lấy thông tin khách hàng theo email
    public function getCustomerByEmail($email) {
        // Sửa bảng 'customers' thành 'KHACHHANG'
        $sql = "SELECT * FROM KHACHHANG WHERE EMAIL = :email";  
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về khách hàng nếu tìm thấy
    }

    // Tạo khách hàng mới
    public function createCustomer($name, $email, $hashedPassword) {
        try {
            // Sửa bảng 'customers' thành 'KHACHHANG'
            $sql = "INSERT INTO KHACHHANG (TEN, EMAIL, MATKHAU) VALUES (:name, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();
            return $this->conn->lastInsertId();  // Trả về ID của khách hàng mới
        } catch (PDOException $e) {
            return false;
        }
    }

    // Lấy thông tin khách hàng theo ID
    public function getCustomerById($id) {
        // Sửa bảng 'customers' thành 'KHACHHANG'
        $sql = "SELECT * FROM KHACHHANG WHERE MAKH = :id";  
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về thông tin khách hàng
    }

    // Cập nhật thông tin khách hàng
    public function updateCustomer($id, $name, $email) {
        try {
            // Sửa bảng 'customers' thành 'KHACHHANG'
            $sql = "UPDATE KHACHHANG SET TEN = :name, EMAIL = :email WHERE MAKH = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();  // Trả về true nếu cập nhật thành công
        } catch (PDOException $e) {
            return false;
        }
    }

    // Lấy tất cả khách hàng
    public function getAllCustomers() {
        // Sửa bảng 'customers' thành 'KHACHHANG'
        $sql = "SELECT * FROM KHACHHANG";  // Truy vấn lấy tất cả khách hàng
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Trả về tất cả khách hàng dưới dạng mảng
    }
}
?>
