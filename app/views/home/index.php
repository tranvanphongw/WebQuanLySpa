<?php require_once 'app/views/shares/header.php'; ?>

<style>
    body {
        background-color: rgb(182, 156, 130);
        font-family: 'Segoe UI', sans-serif;
        color: #3b2e2e;
    }

    h1, h2, h5 {
        color: #3b1f1f;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-weight: bold;
        color: #7a5047;
    }

    .card-text {
        color: #5a4c3b;
    }

    .btn-primary {
        background-color: #a37e58;
        border: none;
    }

    .btn-primary:hover {
        background-color: #8e6c4d;
    }

    .carousel-inner {
        border-radius: 12px;
        overflow: hidden;
    }

    .badge-info {
        background-color: #a37e58;
        font-size: 0.9rem;
        padding: 6px 12px;
        border-radius: 20px;
    }

    .container {
        padding-top: 30px;
        padding-bottom: 60px;
    }
</style>

<div class="container">
    <h1 class="text-center mb-4">Chào mừng đến với <strong>Mayu Japanese Esthetic Spa</strong></h1>
    <p class="text-center mb-5">
        Chúng tôi cung cấp các dịch vụ chăm sóc sắc đẹp và sức khỏe hàng đầu.<br>
        Hãy đến với chúng tôi để trải nghiệm những dịch vụ tốt nhất cho bạn.
    </p>

    <!-- Banner -->
    <div id="bannerCarousel" class="carousel slide mb-5" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $banners = ['spa-banner.jpg', 'spa-banner1.jpg', 'spa-banner2.jpg', 'spa-banner3.jpg'];
            foreach ($banners as $index => $banner): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="public/uploads/<?= $banner ?>" class="d-block w-100"
                         alt="Banner <?= $index + 1 ?>"
                         style="max-height: 400px; object-fit: cover;">
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Trước</span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sau</span>
        </a>
    </div>

    <!-- Dịch vụ dạng slide -->
    <h2 class="text-center mb-4">Dịch vụ của chúng tôi</h2>

    <div id="serviceCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" id="service-carousel-inner"></div>

        <a class="carousel-control-prev" href="#serviceCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Trước</span>
        </a>
        <a class="carousel-control-next" href="#serviceCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sau</span>
        </a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch("http://localhost:8080/WebQuanLySpa/api/dichvu/list-dichvu.php")
            .then(res => res.json())
            .then(res => {
                if (res.status === "success") {
                    const services = res.data;
                    const carouselInner = document.getElementById("service-carousel-inner");

                    for (let i = 0; i < services.length; i += 3) {
                        const group = services.slice(i, i + 3);
                        const item = document.createElement("div");
                        item.className = "carousel-item" + (i === 0 ? " active" : "");

                        const row = document.createElement("div");
                        row.className = "d-flex justify-content-center gap-4";

                        group.forEach(dv => {
                            const card = document.createElement("div");
                            card.className = "card mx-2";
                            card.style.width = "18rem";

                            card.innerHTML = `
                                <img src="public/uploads/${dv.HINHANH}" class="card-img-top" alt="${dv.TEN}" style="height: 200px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">${dv.TEN}</h5>
                                    <p class="card-text">${dv.MOTA}</p>
                                    <p><strong>Thời gian:</strong> ${dv.THOIGIANTHUCHIEN} phút</p>
                                    <p><strong>Giá:</strong> ${Number(dv.GIATIEN).toLocaleString()} VND</p>
                                    <span class="badge badge-info">${dv.TENLOAI}</span>
                                </div>
                            `;

                            row.appendChild(card);
                        });

                        item.appendChild(row);
                        carouselInner.appendChild(item);
                    }
                } else {
                    document.getElementById("service-carousel-inner").innerHTML = `<div class="text-center text-danger">${res.message}</div>`;
                }
            })
            .catch(error => {
                console.error("Lỗi:", error);
                document.getElementById("service-carousel-inner").innerHTML = `<div class="text-center text-danger">Không thể tải dịch vụ.</div>`;
            });
    });
</script>

<?php require_once 'app/views/shares/footer.php'; ?>