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

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const token = localStorage.getItem("token");
    const alertBox = document.getElementById("alert-box");

    if (!token) {
        alertBox.className = "alert alert-danger";
        alertBox.innerText = "Bạn chưa đăng nhập.";
        alertBox.style.display = "block";
        return;
    }

    // Load dữ liệu ban đầu từ API get-profile
    fetch("http://localhost/WebQuanLySpa/api/khachhang/get-profile.php", {
        headers: { Authorization: "Bearer " + token }
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === "success") {
            // Điền dữ liệu vào form
            document.getElementById("name").value = res.data.TEN || '';
            document.getElementById("email").value = res.data.EMAIL || '';
        } else {
            showError("Không thể tải hồ sơ: " + res.message);
        }
    })
    .catch(() => showError("Lỗi khi tải hồ sơ."));

    // Gửi cập nhật lên API update-profile
    document.getElementById("update-profile-form").addEventListener("submit", function (e) {
        e.preventDefault();

        const data = {
            TEN: document.getElementById("name").value,
            EMAIL: document.getElementById("email").value,
            DCHI: "",  // Nếu có thông tin khác như địa chỉ, bạn có thể thêm vào đây
            DTHOAI: "",
            MATKHAU: ""  // Nếu bạn có trường mật khẩu, bạn có thể thêm ở đây
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
