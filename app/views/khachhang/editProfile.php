<?php require_once 'app/views/shares/header.php'; ?>

<div class="container" style="margin-top: 50px;">
    <h2>Chỉnh sửa hồ sơ</h2>

    <div id="alert-box" style="display: none;" class="alert"></div>

    <form id="update-profile-form">
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input 
                type="text" 
                class="form-control" 
                id="name" 
                name="name"
                required
            >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email"
                required
            >
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input 
                type="text" 
                class="form-control" 
                id="address" 
                name="address"
            >
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input 
                type="text" 
                class="form-control" 
                id="phone" 
                name="phone"
            >
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const token = localStorage.getItem("token");
    const alertBox = document.getElementById("alert-box");

    if (!token) {
        showError("Bạn chưa đăng nhập.");
        return;
    }

    // Gửi yêu cầu GET để lấy thông tin hồ sơ
    fetch("http://localhost/WebQuanLySpa/api/khachhang/get-profile.php", {
        headers: { Authorization: "Bearer " + token }
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            // Điền dữ liệu vào form
            document.getElementById("name").value = res.data.TEN || '';
            document.getElementById("email").value = res.data.EMAIL || '';
            document.getElementById("address").value = res.data.DCHI || '';
            document.getElementById("phone").value = res.data.DTHOAI || '';
        } else {
            showError("Không thể tải hồ sơ: " + res.message);
        }
    })
    .catch(() => showError("Lỗi khi tải hồ sơ."));

    // Xử lý form gửi cập nhật thông tin
    document.getElementById("update-profile-form").addEventListener("submit", function (e) {
        e.preventDefault();

        const data = {
            TEN: document.getElementById("name").value,
            EMAIL: document.getElementById("email").value,
            DCHI: document.getElementById("address").value,
            DTHOAI: document.getElementById("phone").value
        };

        fetch("http://localhost/WebQuanLySpa/api/khachhang/update-profile.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Authorization: "Bearer " + token
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(res => {
            if (res.status === "success") {
                showSuccess(res.message || "Cập nhật thành công.");
            } else {
                showError(res.message || "Cập nhật thất bại.");
            }
        })
        .catch(() => showError("Không thể gửi yêu cầu cập nhật."));

        function showError(message) {
            alertBox.className = "alert alert-danger";
            alertBox.innerText = message;
            alertBox.style.display = "block";
        }

        function showSuccess(message) {
            alertBox.className = "alert alert-success";
            alertBox.innerText = message;
            alertBox.style.display = "block";
        }
    });
});

</script>


<?php require_once 'app/views/shares/footer.php'; ?>
