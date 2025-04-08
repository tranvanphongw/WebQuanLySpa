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
            <div class="form-group">
                <label for="package">Chọn dịch vụ</label>
                <select id="service" name="service" class="form-control" required>
                    <option value="">-- Chọn dịch vụ --</option>
                </select>
            </div>

            <div class="form-group">
                <label for="employee">Chọn nhân viên</label>
                <select id="employee" name="employee" class="form-control" required>
                    <option value="">-- Chọn nhân viên --</option>
                </select>
            </div>

            <div class="form-group">
                <label for="start_time">Thời gian bắt đầu</label>
                <input type="datetime-local" id="start_time" name="start_time" class="form-control" required>
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

            // Lấy danh sách dịch vụ
            $.ajax({
                url: '/WebQuanLySpa/api/dichvu/list-dichvu.php',
                method: 'GET',
                dataType: 'json',  // Thêm dòng này
                success: function(response) {
                    console.log(response);
                    if(response.status === 'success') {
                        $('#service').empty();
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


        // Lấy danh sách nhân viên
        // Lấy danh sách nhân viên
        $.ajax({
            url: '/WebQuanLySpa/api/nhanvien/list-nhanvien.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log("Response nhân viên:", response);
                $('#employee').empty().append('<option value="">-- Chọn nhân viên --</option>');  // Thêm option mặc định vào trước

                if(response.status === 'success' && response.data.length > 0) {
                    response.data.forEach(function(employee) {
                        $('#employee').append(
                            '<option value="' + employee.MANV + '">' + employee.TEN + '</option>'
                        );
                    });
                } else {
                    $('#employee').append('<option value="">Không có nhân viên nào</option>');
                }
            },
            error: function() {
                $('#employee').append('<option value="">Không thể tải dữ liệu nhân viên</option>');
            }
        });


        // Gửi form đặt lịch bằng AJAX
        $('#bookingForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serializeArray();
            var data = {};
            formData.forEach(function(field) {
                data[field.name] = field.value;
            });

            // Gửi yêu cầu POST tới API đặt lịch
            $.ajax({
                url: 'http://localhost:8080/WebQuanLySpa/api/lichdat/book.php',  
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    var result = JSON.parse(response);
                    $('#responseMessage').html('<div class="alert alert-' + (result.status === 'success' ? 'success' : 'danger') + '">' + result.message + '</div>');
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
