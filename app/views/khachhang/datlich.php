<?php require_once 'app/views/shares/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt Lịch Dịch Vụ | Spa Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Đặt Lịch Dịch Vụ</h1>

    <form id="bookingForm">
        <!-- ✅ THÊM MÃ KHÁCH HÀNG (bắt buộc để API hoạt động) -->
        <input type="hidden" name="makh" value="<?php echo $_SESSION['customer_id']; ?>">

        <!-- ✅ ĐỔI NAME từ service -> madv -->
        <div class="form-group">
            <label>Chọn dịch vụ</label>
            <select id="service" name="madv" class="form-control" required>
                <option value="">-- Chọn dịch vụ --</option>
            </select>
        </div>

        <!-- ✅ ĐỔI NAME từ employee -> manv -->
        <div class="form-group">
            <label>Chọn nhân viên</label>
            <select id="employee" name="manv" class="form-control" required>
                <option value="">-- Chọn nhân viên --</option>
            </select>
        </div>

        <!-- ✅ ĐỔI NAME từ start_time -> thoigianbatdau -->
        <div class="form-group">
            <label>Thời gian bắt đầu</label>
            <input type="datetime-local" id="start_time" name="thoigianbatdau" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Đặt lịch</button>
    </form>

    <div id="responseMessage" class="mt-3"></div>
</div>

<script>
$(document).ready(function() {
    // Giải mã Unicode
    function decodeUnicode(str) {
        return decodeURIComponent(escape(str));
    }

    // ✅ Lấy danh sách dịch vụ
    $.ajax({
        url: '/WebQuanLySpa/api/dichvu/list-dichvu.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#service').empty().append('<option value="">-- Chọn dịch vụ --</option>');
            if (response.status === 'success') {
                response.data.forEach(function(service) {
                    $('#service').append('<option value="' + service.MADV + '">' + service.TEN + '</option>');
                });
            } else {
                $('#service').append('<option value="">Không có dịch vụ nào</option>');
            }
        },
        error: function() {
            $('#service').append('<option value="">Không thể tải dữ liệu dịch vụ</option>');
        }
    });

    // ✅ Lấy danh sách nhân viên
    $.ajax({
        url: '/WebQuanLySpa/api/nhanvien/list-nhanvien.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#employee').empty().append('<option value="">-- Chọn nhân viên --</option>');
            if (response.status === 'success' && response.data.length > 0) {
                response.data.forEach(function(employee) {
                    $('#employee').append('<option value="' + employee.MANV + '">' + employee.TEN + '</option>');
                });
            } else {
                $('#employee').append('<option value="">Không có nhân viên nào</option>');
            }
        },
        error: function() {
            $('#employee').append('<option value="">Không thể tải dữ liệu nhân viên</option>');
        }
    });

    // ✅ Gửi form đặt lịch
    $('#bookingForm').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serializeArray();
        var data = {};
        formData.forEach(function(field) {
            data[field.name] = field.value;
        });

        $.ajax({
            url: '/WebQuanLySpa/api/lichdat/book.php',  // ✅ Sửa lại URL tương đối để đảm bảo hoạt động
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                var result = JSON.parse(response);
                $('#responseMessage').html(
                    '<div class="alert alert-' + (result.status === 'success' ? 'success' : 'danger') + '">' + result.message + '</div>'
                );
                if (result.status === 'success') {//hiển thị thông báo sẽ đếm ngược sau 3 giây
                    $('#responseMessage').append('<div class="alert alert-info">Chuyển hướng thanh toán sau 3 giây...</div>');
                    setTimeout(function() {
                        window.location.href = '/WebQuanLySpa/thanhtoan';  // ✅ Sửa lại URL tương đối để đảm bảo hoạt động
                    }, 3000); // Chờ 3 giây trước khi chuyển hướng
                }
            },
            error: function() {
                $('#responseMessage').html('<div class="alert alert-danger">Có lỗi khi đặt lịch.</div>');
            }
        });
    });
});
</script>
</body>
</html>