<?php require_once 'app/views/shares/header.php'; ?>

<style>
    .tech-section {
        background-color: #fff8f5;
        padding: 60px 10%;
        text-align: center;
    }

    .tech-section h1 {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #4e2c2c;
    }

    .tech-section p {
        font-size: 18px;
        color: #555;
        max-width: 800px;
        margin: 0 auto 40px;
        line-height: 1.6;
    }

    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .tech-card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .tech-card:hover {
        transform: translateY(-8px);
    }

    .tech-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .tech-card h3 {
        font-size: 20px;
        color: #3e2723;
        margin: 15px;
    }

    .tech-card p {
        font-size: 15px;
        color: #666;
        margin: 0 15px 20px;
        line-height: 1.5;
    }
</style>

<section class="tech-section">
    <h1>CÔNG NGHỆ SPA HIỆN ĐẠI</h1>
    <p>
        Mayu Spa không ngừng cập nhật các công nghệ làm đẹp hiện đại từ Nhật Bản và Hàn Quốc, nhằm mang đến trải nghiệm chăm sóc chuyên sâu và an toàn cho khách hàng.
    </p>

    <div class="tech-grid">
        <!-- Card 1 -->
        <div class="tech-card">
            <img src="public/uploads/congnghe1.png" alt="Công nghệ trẻ hóa da HIFU">
            <h3>Trẻ hóa da bằng HIFU</h3>
            <p>
                Công nghệ sóng siêu âm hội tụ giúp nâng cơ, giảm nhăn và tái tạo da mà không cần phẫu thuật.
            </p>
        </div>

        <!-- Card 2 -->
        <div class="tech-card">
            <img src="public/uploads/congnghe2.jpg" alt="Công nghệ ánh sáng sinh học">
            <h3>Ánh sáng sinh học Bio-Light</h3>
            <p>
                Điều trị mụn, thâm, nám bằng ánh sáng quang học hiện đại – an toàn và hiệu quả cao.
            </p>
        </div>

        <!-- Card 3 -->
        <div class="tech-card">
            <img src="public/uploads/congnghe3.jpg" alt="Công nghệ oxy jet">
            <h3>Oxy Jet – Làm sạch sâu</h3>
            <p>
                Đưa oxy tinh khiết vào sâu trong da, cấp ẩm và detox hiệu quả cho làn da mệt mỏi.
            </p>
        </div>

        <!-- Card 4 -->
        <div class="tech-card">
            <img src="public/uploads/congnghe4.jpg" alt="Công nghệ RF nâng cơ">
            <h3>Nâng cơ bằng sóng RF</h3>
            <p>
                Sử dụng sóng RF giúp kích thích collagen, cải thiện độ đàn hồi cho làn da săn chắc hơn.
            </p>
        </div>
    </div>
</section>

<?php require_once 'app/views/shares/footer.php'; ?>
