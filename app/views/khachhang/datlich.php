<?php
// Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
if (!isset($_SESSION['customer_id'])) {
    header("Location: /WebQuanLySpa/khachhang/login");
    exit;
}

// Lấy thông tin khách hàng (giả sử là đã đăng nhập)
$makh = $_SESSION['customer_id'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt lịch hẹn | Spa Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/WebQuanLySpa/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Đặt Lịch Hẹn</h1>

        <!-- Form Đặt Lịch -->
        <form id="bookingForm">
            <div class="form-group">
                <label for="package">Chọn gói dịch vụ</label>
                <select id="package" name="package" class="form-control" required>
                    <option value="">-- Chọn gói dịch vụ --</option>
                    <option value="goidacbiet">GÓI ĐẶC BIỆT</option>
                    <option value="massage4tay">Massage 4 tay</option>
                    <option value="chamsocdamat">Chăm sóc da mặt</option>
                </select>
            </div>

            <div class="form-group">
                <label for="service">Chọn dịch vụ</label>
                <select id="service" name="service" class="form-control" required>
                    <option value="">-- Chọn dịch vụ --</option>
                </select>
            </div>

            <div class="form-group">
                <label for="staff">Chọn nhân viên</label>
                <select id="staff" name="staff" class="form-control" required>
                    <option value="">-- Chọn nhân viên --</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Chọn ngày</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="time">Chọn thời gian</label>
                <select id="time" name="time" class="form-control" required>
                    <option value="">-- Chọn thời gian --</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Xác nhận đặt lịch</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        // Khi gói dịch vụ thay đổi, gọi API để lấy dịch vụ
        document.getElementById("package").addEventListener("change", function () {
            const selectedPackage = this.value;
            
            // Gọi API để lấy danh sách dịch vụ của gói đã chọn
            fetch(`/WebQuanLySpa/api/dichvu/list-dichvu.php?search=${selectedPackage}`)
                .then(response => response.json())
                .then(data => {
                    const serviceSelect = document.getElementById("service");
                    serviceSelect.innerHTML = '<option value="">-- Chọn dịch vụ --</option>';

                    if (data.status === "success" && data.data.length > 0) {
                        data.data.forEach(service => {
                            const option = document.createElement("option");
                            option.value = service.MADV;
                            option.text = `${service.TEN} - ${service.GIATIEN} VNĐ`;
                            serviceSelect.appendChild(option);
                        });
                    } else {
                        const option = document.createElement("option");
                        option.value = "";
                        option.text = "Không có dịch vụ nào";
                        serviceSelect.appendChild(option);
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });

        // Khi dịch vụ thay đổi, gọi API để lấy nhân viên phù hợp
        document.getElementById("service").addEventListener("change", function () {
            const selectedService = this.value;
            
            // Gọi API để lấy danh sách nhân viên phù hợp với dịch vụ
            fetch(`/WebQuanLySpa/api/nhanvien/filter-nhanvien.php?service=${selectedService}`)
                .then(response => response.json())
                .then(data => {
                    const staffSelect = document.getElementById("staff");
                    staffSelect.innerHTML = '<option value="">-- Chọn nhân viên --</option>';
                    
                    data.staff.forEach(staff => {
                        const option = document.createElement("option");
                        option.value = staff.MANV;
                        option.text = staff.TEN;
                        staffSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching staff:', error);
                });
        });

        // Gửi thông tin đặt lịch
        document.getElementById("bookingForm").addEventListener("submit", function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            // Gửi dữ liệu đặt lịch vào API
            fetch('/WebQuanLySpa/api/lichdat/create-lichdat.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Đặt lịch thành công!');
                } else {
                    alert('Lỗi khi đặt lịch!');
                }
            })
            .catch(error => {
                alert('Có lỗi xảy ra! Vui lòng thử lại.');
            });
        });
    </script>
</body>
</html>
