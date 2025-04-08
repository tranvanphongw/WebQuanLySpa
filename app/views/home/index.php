<?php require_once 'app/views/shares/header.php'; ?>

<div class="container">
    <h1>Chào mừng đến với SpaManagement</h1>
    <p>
        Chúng tôi cung cấp các dịch vụ chăm sóc sắc đẹp và sức khỏe hàng đầu. 
        Hãy đến với chúng tôi để trải nghiệm những dịch vụ tốt nhất cho bạn.
    </p>

    <!-- Ảnh Banner -->
    <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="public/uploads/spa-banner.jpg" class="d-block w-100" alt="Banner Spa 1" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="public/uploads/spa-banner1.jpg" class="d-block w-100" alt="Banner Spa 2" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="public/uploads/spa-banner2.jpg" class="d-block w-100" alt="Banner Spa 3" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="public/uploads/spa-banner3.jpg" class="d-block w-100" alt="Banner Spa 3" style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
        <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Danh sách dịch vụ -->
    <div class="services mt-5">
        <h2 class="text-center">Dịch vụ của chúng tôi</h2>
        <div class="row" id="service-list"></div> <!-- Danh sách dịch vụ sẽ được thêm vào đây -->
        <div class="text-center">
            <button id="loadMoreBtn" class="btn btn-primary">Xem thêm</button>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    fetch("http://localhost:8080/WebQuanLySpa/api/dichvu/list-dichvu.php")  // API URL của bạn với cổng 8080
        .then(res => {
            if (!res.ok) {
                throw new Error("Lỗi kết nối API");
            }
            return res.json();
        })
        .then(res => {
            if (res.status === "success") {
                const serviceList = document.getElementById("service-list");

                res.data.forEach((dv, index) => {
                    const col = document.createElement("div");
                    col.className = "col-md-4 mb-4 service-item"; // Thêm lớp cho mỗi mục dịch vụ

                    col.innerHTML = `
                        <div class="card h-100 shadow-sm">
                            <img src="public/uploads/${dv.HINHANH}" class="card-img-top" alt="${dv.TEN}">
                            <div class="card-body">
                                <h5 class="card-title">${dv.TEN}</h5>
                                <p class="card-text">${dv.MOTA}</p>
                                <p><strong>Thời gian:</strong> ${dv.THOIGIANTHUCHIEN} phút</p>
                                <p><strong>Giá:</strong> ${Number(dv.GIATIEN).toLocaleString()} VND</p>
                                <p><span class="badge bg-info">${dv.TENLOAI}</span></p>
                                <a href="/WebQuanLySpa/dich-vu/${dv.MADV}" class="btn btn-primary">Xem thêm</a>
                            </div>
                        </div>
                    `;
                    serviceList.appendChild(col);
                });

                // Nút "Xem thêm" hoạt động
                document.getElementById("loadMoreBtn").addEventListener("click", () => {
                    const hiddenServices = document.querySelectorAll(".service-item:nth-child(n+7)"); // Lấy các dịch vụ chưa hiển thị
                    hiddenServices.forEach(service => {
                        service.style.display = "block"; // Hiển thị các dịch vụ ẩn
                    });
                    document.getElementById("loadMoreBtn").style.display = "none"; // Ẩn nút "Xem thêm" khi không còn dịch vụ để hiển thị
                });
            } else {
                document.getElementById("service-list").innerHTML = `<div class="col-12 text-danger">${res.message}</div>`;
            }
        })
        .catch(error => {
            console.error("Lỗi: ", error);
            document.getElementById("service-list").innerHTML = `<div class="col-12 text-danger">Không thể tải danh sách dịch vụ. Vui lòng kiểm tra lại kết nối hoặc API.</div>`;
        });
});

</script>

<?php require_once 'app/views/shares/footer.php'; ?>
