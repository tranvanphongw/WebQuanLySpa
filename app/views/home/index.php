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

    <style>
    .spa-services {
        text-align: center;
        padding: 40px 20px;
        background-color: #f9f5ec;
    }

    .spa-services h2 {
        font-size: 36px;
        margin-bottom: 40px;
        color: #3b1f1f;
    }

    .service-icons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 40px;
    }

    .service-item {
        max-width: 140px;
        color: #5c3c3c;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .service-item:hover {
        color: #a37e58;
        transform: translateY(-5px);
    }

    .service-item img {
        width: 50px;
        height: 50px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .service-item span {
        display: block;
        font-weight: 500;
        font-size: 14px;
        margin-top: 5px;
    }

    .service-description {
        max-width: 900px;
        margin: 40px auto 0;
        color: #5a4c3b;
        font-size: 16px;
        line-height: 1.6;
    }
</style>

<div class="spa-services">
    <h2>Dịch vụ của Mayu Japanese Esthetic Spa</h2>

    <div class="service-icons">
        <div class="service-item" data-title="Làm đẹp toàn diện" data-desc="Dịch vụ làm đẹp toàn diện giúp cải thiện toàn bộ sức khỏe và làn da của bạn thông qua liệu trình đặc biệt.">
            <img src="public/uploads/icons1.png" alt="Làm đẹp toàn diện">
            <span>Làm đẹp toàn diện</span>
        </div>
        <div class="service-item" data-title="Massage thư giãn" data-desc="Massage giúp thư giãn cơ thể, giảm căng thẳng và cải thiện tuần hoàn máu.">
            <img src="public/uploads/icons3.png" alt="Massage">
            <span>MASSAGE THƯ GIÃN</span>
        </div>
        <div class="service-item" data-title="Chăm sóc da chuyên sâu" data-desc="Liệu trình chăm sóc da chuyên sâu giúp da bạn trở nên khỏe mạnh, sáng mịn và tươi trẻ hơn.">
            <img src="public/uploads/icons2.png" alt="Chăm sóc da">
            <span>Chăm sóc da chuyên sâu</span>
        </div>
        <div class="service-item" data-title="Xông hơi" data-desc="Xông hơi giúp giải độc cơ thể, thư giãn tinh thần và tăng cường miễn dịch.">
            <img src="public/uploads/icons4.png" alt="Xông hơi">
            <span>XÔNG HƠI</span>
        </div>
        <div class="service-item" data-title="Chăm sóc tóc" data-desc="Phục hồi và nuôi dưỡng mái tóc mềm mượt, chắc khỏe nhờ liệu trình chăm sóc chuyên biệt.">
            <img src="public/uploads/icons5.png" alt="Chăm sóc tóc">
            <span>CHĂM SÓC TÓC</span>
        </div>
    </div>

    <div class="service-description" id="service-description">
    </div>
</div>

<script>
    document.querySelectorAll('.service-item').forEach(item => {
        item.addEventListener('click', () => {
            const title = item.getAttribute('data-title');
            const desc = item.getAttribute('data-desc');

            document.getElementById('service-description').innerHTML = `
                <h4 style="color:#3b1f1f; margin-bottom: 15px;">${title}</h4>
                <p>${desc}</p>
            `;
        });
    });
</script>


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
                res.data.forEach(dv => {
                    const col = document.createElement("div");
                    col.className = "col-md-4 mb-4";

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