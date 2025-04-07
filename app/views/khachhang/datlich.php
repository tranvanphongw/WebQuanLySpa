<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đặt lịch hẹn | Spa Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    :root {
      --primary-color: #3a7bd5;
      --secondary-color: #00d2ff;
      --accent-color: #f5f7fa;
      --text-color: #333;
      --light-gray: #f0f2f5;
      --border-color: #ddd;
      --success-color: #4CAF50;
      --error-color: #F44336;
    }
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      margin: 0;
      padding: 0;
      background-color: var(--accent-color);
      color: var(--text-color);
    }
    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
    }
    .header {
      text-align: center;
      margin-bottom: 30px;
      background-image: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .logo {
      max-width: 120px;
      margin-bottom: 10px;
    }
    h1 {
      margin: 10px 0;
      font-weight: 600;
      letter-spacing: 1px;
    }
    .info {
      text-align: center;
      font-size: 16px;
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      gap: 20px;
    }
    .info div {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .nav {
      display: flex;
      justify-content: center;
      margin-bottom: 30px;
      background-color: white;
      border-radius: 30px;
      padding: 5px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .nav-item {
      padding: 12px 30px;
      text-decoration: none;
      color: var(--text-color);
      font-weight: bold;
      border-radius: 25px;
      transition: all 0.3s ease;
    }
    .nav-item.active {
      background-image: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      color: white;
    }
    .form-container {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 25px;
    }
    .form-title {
      font-weight: 600;
      margin-bottom: 12px;
      color: var(--text-color);
      font-size: 16px;
    }
    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      font-size: 15px;
      transition: all 0.3s ease;
    }
    .form-control:focus {
      border-color: var(--primary-color);
      outline: none;
      box-shadow: 0 0 0 2px rgba(58, 123, 213, 0.2);
    }
    .booking-form {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px 0;
    }
    .phone-group {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .country-code {
      display: flex;
      align-items: center;
      gap: 5px;
      background: var(--light-gray);
      padding: 10px 15px;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      font-size: 15px;
    }
    .country-code .flag {
      width: 24px;
      height: auto;
    }
    .name-group {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }
    .select-gender {
      width: 30%;
      min-width: 100px;
    }
    .locations {
      display: flex;
      gap: 15px;
      margin-bottom: 20px;
    }
    .location-card {
      flex: 1;
      border: 1px solid var(--border-color);
      border-radius: 8px;
      padding: 15px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .location-card.selected {
      border-color: var(--primary-color);
      background-color: rgba(58, 123, 213, 0.1);
    }
    .date-selector {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 15px;
      margin-bottom: 25px;
    }
    .date-card {
      border: 1px solid var(--border-color);
      border-radius: 8px;
      padding: 15px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
      background-color: white;
    }
    .date-card.selected {
      border-color: var(--primary-color);
      background-color: rgba(58, 123, 213, 0.1);
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .date-label {
      font-size: 14px;
      color: #666;
      margin-bottom: 5px;
    }
    .date-day {
      font-size: 18px;
      font-weight: bold;
      margin: 5px 0;
      color: var(--primary-color);
    }
    .date-date {
      font-size: 16px;
      color: var(--text-color);
    }
    .time-period-selector {
      margin-bottom: 20px;
    }
    .btn-group {
      display: flex;
      gap: 15px;
      margin-bottom: 20px;
    }
    .btn-group .btn {
      flex: 1;
    }
    .time-selector {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
      gap: 10px;
      margin-bottom: 25px;
    }
    .time-slot {
      border: 1px solid var(--border-color);
      border-radius: 8px;
      padding: 10px 5px;
      text-align: center;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.3s ease;
      background-color: white;
    }
    .time-slot.selected {
      border-color: var(--primary-color);
      background-color: rgba(58, 123, 213, 0.1);
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .time-slot.available {
      color: var(--text-color);
    }
    .time-slot.booked {
      color: #999;
      background-color: var(--light-gray);
      cursor: not-allowed;
      opacity: 0.7;
    }
    .availability {
      font-size: 12px;
      color: var(--success-color);
      font-weight: 500;
    }
    .btn {
      display: inline-block;
      padding: 12px 25px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      text-align: center;
      transition: all 0.3s ease;
    }
    .btn.active {
      background-image: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      color: white;
      box-shadow: 0 4px 10px rgba(58, 123, 213, 0.3);
    }
    .btn-primary {
      background-image: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      color: white;
      width: 100%;
      box-shadow: 0 4px 10px rgba(58, 123, 213, 0.3);
    }
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(58, 123, 213, 0.4);
    }
    .btn-outline {
      background-color: white;
      border: 1px solid var(--border-color);
      color: var(--text-color);
    }
    .btn-outline:hover {
      background-color: var(--light-gray);
    }
    .error {
      color: var(--error-color);
      margin-bottom: 15px;
      font-size: 14px;
      padding: 10px;
      border-radius: 8px;
      background-color: rgba(244, 67, 54, 0.1);
    }
    .success {
      color: var(--success-color);
      margin-bottom: 15px;
      font-size: 14px;
      padding: 10px;
      border-radius: 8px;
      background-color: rgba(76, 175, 80, 0.1);
    }
    .footer {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
      color: #666;
      padding: 20px;
    }
    .section-separator {
      border-top: 1px solid var(--border-color);
      margin: 30px 0;
      position: relative;
    }
    .section-separator::before {
      content: attr(data-title);
      position: absolute;
      top: -12px;
      left: 50%;
      transform: translateX(-50%);
      background-color: white;
      padding: 0 15px;
      color: var(--primary-color);
      font-weight: 600;
    }
    @media (max-width: 768px) {
      .date-selector {
        grid-template-columns: 1fr;
      }
      .time-selector {
        grid-template-columns: repeat(3, 1fr);
      }
      .name-group {
        flex-direction: column;
      }
      .select-gender {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1><i class="fas fa-spa"></i> Spa Management</h1>
      <div class="info">
        <div><i class="far fa-clock"></i> Giờ mở cửa: 09:00 - 22:00</div>
        <div><i class="fas fa-phone-alt"></i> Điện thoại: 0xxx.xxx.xxx</div>
      </div>
    </div>
    
    <div class="nav">
      <a href="#" class="nav-item active">ĐẶT LỊCH</a>
    </div>
    
    <div class="form-container">
      <div id="errorMessage" class="error" style="display: none;"></div>
      <div id="successMessage" class="success" style="display: none;"></div>
      
      <form id="bookingForm">
        <div class="booking-form">
          <p class="form-title">Thông tin khách hàng</p>

          <div class="form-group phone-group">
            <div class="country-code">
              <img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/flags/4x3/vn.svg" alt="Vietnam" class="flag" />
              <span>+84</span>
              <i class="fa fa-chevron-down"></i>
            </div>
            <input type="tel" name="mobile" placeholder="Số điện thoại" id="mobile" class="form-control" min="0" required />
          </div>

          <div class="form-group name-group">
            <select id="gender" name="gender" class="form-control select-gender">
              <option value="F" selected>Chị</option>
              <option value="M">Anh</option>
            </select>
            <input type="text" name="customer_name" maxlength="50" placeholder="Họ Và Tên" id="customer_name" class="form-control" required />
          </div>

          <div class="form-group">
            <label for="group_size" class="form-title">Bạn đi theo nhóm?</label>
            <select name="group_size" id="group_size" class="form-control">
              <option value="1">1 người</option>
              <option value="2">2 người</option>
              <option value="3">3 người</option>
              <option value="4">4 người trở lên</option>
            </select>
          </div>
        </div>
        
        <div class="section-separator" data-title="Thời gian"></div>
        
        <div class="form-group">
          <div class="form-title" style="display: flex; justify-content: space-between; align-items: center;">
            <span>Thời gian đặt lịch</span>
            <span id="current-date-display" style="font-weight: normal; font-size: 14px; color: #555;"></span>
          </div>
          <div class="date-selector">
            <div class="date-card selected" onclick="selectDate(this, 'input1')">
              <div class="date-label">Hôm Nay</div>
              <div class="date-day" id="day1"></div>
              <div class="date-date" id="date1"></div>
              <input type="radio" name="date" id="input1" value="today" checked style="display: none;">
            </div>
            <div class="date-card" onclick="selectDate(this, 'input2')">
              <div class="date-label">Ngày Mai</div>
              <div class="date-day" id="day2"></div>
              <div class="date-date" id="date2"></div>
              <input type="radio" name="date" id="input2" value="tomorrow" style="display: none;">
            </div>
            <div class="date-card" onclick="selectDate(this, 'input3')">
              <div class="date-label">Ngày Kia</div>
              <div class="date-day" id="day3"></div>
              <div class="date-date" id="date3"></div>
              <input type="radio" name="date" id="input3" value="day-after" style="display: none;">
            </div>
          </div>
        </div>
        
        <div class="form-group time-period-selector">
          <div class="form-title">Chọn thời điểm</div>
          <div class="btn-group">
            <button type="button" class="btn btn-outline" onclick="setActive(this, 'morning')">
              <i class="fas fa-sun"></i> Buổi sáng
            </button>
            <button type="button" class="btn btn-outline" onclick="setActive(this, 'afternoon')">
              <i class="fas fa-cloud-sun"></i> Buổi chiều
            </button>
            <button type="button" class="btn btn-outline" onclick="setActive(this, 'evening')">
              <i class="fas fa-moon"></i> Buổi tối
            </button>
          </div>
        </div>

        <div class="form-group">
          <div class="form-title">Chọn khung giờ phục vụ <span style="color: var(--error-color);">*</span></div>
          <div class="time-selector" id="timeSlots"></div>
          <input type="hidden" name="selected_time" id="selected_time" required>
        </div>
        
        <div class="section-separator" data-title="Dịch vụ"></div>

        <div class="form-group">
          <div class="form-title">Chọn gói dịch vụ <span style="color: var(--error-color);">*</span></div>
          <select id="package" name="package" class="form-control" required>
            <option value="">-- Chọn gói dịch vụ --</option>
            <option value="goidacbiet">GÓI ĐẶC BIỆT</option>
            <option value="massage4tay">Massage 4 tay</option>
            <option value="khoanhkhacthugian">Khoảnh khắc thư giãn</option>
            <option value="chamsocdamat">Chăm sóc da mặt</option>
            <option value="massagecothe">Massage cơ thể</option>
            <option value="chamsocchan">Chăm sóc chân</option>
            <option value="chamsocdatoanthan">Chăm sóc da toàn thân</option>
            <option value="thugiandacbiet">Thư giãn đặc biệt</option>
            <option value="bonglaitiencanh">Bồng Lai Tiên Cảnh</option>
          </select>
        </div>

        <div class="form-group">
          <div class="form-title">Chọn dịch vụ <span style="color: var(--error-color);">*</span></div>
          <select id="service" name="service" class="form-control" required>
            <option value="">-- Chọn dịch vụ --</option>
          </select>
        </div>

        <div class="form-group">
          <div class="form-title">Ghi chú thêm</div>
          <textarea name="notes" class="form-control" rows="4" placeholder="Thêm yêu cầu đặc biệt hoặc ghi chú khác..."></textarea>
        </div>
        
        <form action="app/views/khachhang/ConfirmedOrder.php" method="POST">
    <!-- Your other form fields should be here -->
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-calendar-check"></i> Xác nhận đặt lịch
        <a href="app/views/khachhang/ConfirmedOrder.php" ></a>
    </button>
    
</form>
    </div>
    
    <div class="footer">
      <p>&copy; 2025 Spa Management. Tất cả quyền được bảo lưu.</p>
    </div>
  </div>

  <script>
    // Date setup
    const weekdays = ['Chủ Nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'];

    function updateDates() {
      // Current date display
      const currentDate = new Date();
      const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      document.getElementById('current-date-display').textContent = currentDate.toLocaleDateString('vi-VN', dateOptions);
      
      // Setup date cards
      for (let i = 0; i < 3; i++) {
        const date = new Date();
        date.setDate(date.getDate() + i);
        
        const dayName = weekdays[date.getDay()];
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();

        document.getElementById(`day${i + 1}`).textContent = dayName;
        document.getElementById(`date${i + 1}`).textContent = `${day}/${month}`;
        document.getElementById(`input${i + 1}`).value = `${day}/${month}/${year}`;
      }
    }

    function selectDate(selectedCard, inputId) {
      // Remove selected class from all cards
      const cards = document.querySelectorAll('.date-card');
      cards.forEach(card => card.classList.remove('selected'));
      
      // Add selected class to chosen card
      selectedCard.classList.add('selected');
      
      // Select the corresponding radio button
      document.getElementById(inputId).checked = true;
    }

    // Time slots handling
    const timeRanges = {
      morning: { start: '09:00', end: '11:45', icon: 'fa-sun' },
      afternoon: { start: '14:00', end: '17:45', icon: 'fa-cloud-sun' },
      evening: { start: '18:00', end: '21:45', icon: 'fa-moon' }
    };

    function setActive(button, period) {
      // Update active state of buttons
      const buttons = document.querySelectorAll('.btn-group .btn');
      buttons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
      
      // Generate time slots for selected period
      generateTimeSlots(period);
    }

    function generateTimeSlots(period) {
      const container = document.getElementById('timeSlots');
      container.innerHTML = '';

      const startTime = timeRanges[period].start;
      const endTime = timeRanges[period].end;

      let current = toMinutes(startTime);
      const end = toMinutes(endTime);

      // Generate slots in 15-minute increments
      while (current <= end) {
        const timeStr = toHHMM(current);
        
        // Create availability data - this would come from your backend in a real app
        // Here we're simulating some random availability
        const isAvailable = Math.random() > 0.2; // 80% chance of being available
        const availabilityText = isAvailable ? 'Còn trống' : 'Đã đặt';
        const availabilityClass = isAvailable ? 'available' : 'booked';
        
        const slot = document.createElement('div');
        slot.className = `time-slot ${availabilityClass}`;
        slot.innerHTML = `
          ${timeStr}<br>
          <span class="availability">${availabilityText}</span>
          <input type="radio" name="time" value="${timeStr}" style="display: none;">
        `;
        
        if (isAvailable) {
          slot.onclick = function() { selectTime(this, timeStr); };
        }
        
        container.appendChild(slot);
        current += 15; // 15-minute increments
      }
    }

    function selectTime(element, timeValue) {
      // Update visual selection
      const allSlots = document.querySelectorAll('.time-slot');
      allSlots.forEach(slot => slot.classList.remove('selected'));
      element.classList.add('selected');
      
      // Store the selected time in the hidden input
      document.getElementById('selected_time').value = timeValue;
      
      // Select the radio button
      const radio = element.querySelector('input[type="radio"]');
      if (radio) radio.checked = true;
    }

    function toMinutes(timeStr) {
      const [hours, minutes] = timeStr.split(':').map(Number);
      return hours * 60 + minutes;
    }

    function toHHMM(minutes) {
      const h = Math.floor(minutes / 60).toString().padStart(2, '0');
      const m = (minutes % 60).toString().padStart(2, '0');
      return `${h}:${m}`;
    }

    // Service options data
    const serviceOptions = {
      goidacbiet: [
        { value: "thugiancaocap", text: "Gói Thư Giãn Cao Cấp - 90'" },
        { value: "maymong", text: "Gói Mây Mộng - 90'" },
        { value: "taitao", text: "Gói Tái Tạo Năng Lượng - 2 giờ 15'" },
        { value: "anlanh", text: "Gói Ngày An Lành - 4 giờ 05'" }
      ],
      massage4tay: [
        { value: "massage4tay", text: "Massage 4 tay - 60'" }
      ],
      khoanhkhacthugian: [
        { value: "khoanhkhacthugian", text: "Massage đầu, cổ, lưng & vai - 45'" },
        { value: "khoanhkhacthugian2", text: "Massage tay, đầu, cổ & vai - 30'" },
        { value: "khoanhkhacthugian3", text: "Massage chân - 30'" }
      ],
      chamsocdamat: [
        { value: "chamsocdamat", text: "Chăm sóc da mặt cơ bản - 45'" },
        { value: "chamsocdamat2", text: "Giấc mơ làn da tự nhiên - 60'" },
        { value: "chamsocdamat3", text: "Vẻ đẹp mềm mại - 60'" },
        { value: "chamsocdamat4", text: "Nâng lông vũ - 60'" }
      ],
      massagecothe: [
        { value: "massagecothe", text: "Liệu pháp thư giãn - 60' / 90'" },
        { value: "massagecothe2", text: "Liệu pháp giảm căng thẳng - 60' / 90'" },
        { value: "massagecothe3", text: "Massage đá nóng - 60' / 90'" },
        { value: "massagecothe4", text: "Massage đá muối Himalaya - 60' / 90'" }
      ],
      chamsocchan: [
        { value: "chamsocchan", text: "Liệu pháp chân bằng tinh dầu - 60'" },
        { value: "chamsocchan2", text: "Chữa bệnh chân - 60'" },
        { value: "chamsocchan3", text: "Trị liệu toàn bộ bàn chân - 75'" },
        { value: "chamsocchan4", text: "Liệu pháp chân bằng thảo dược - 60'" }
      ],
      chamsocdatoanthan: [
        { value: "chamsocdatoanthan", text: "Tẩy tế bào chết toàn thân - 45'" },
        { value: "chamsocdatoanthan2", text: "Quấn cơ thể bùn và sữa - 45'" }
      ],
      thugiandacbiet: [
        { value: "thugiandacbiet", text: "Phòng xông hơi - 20'" }
      ],
      bonglaitiencanh: [
        { value: "bonglaitiencanh", text: "Bồng Lai Tiên Cảnh" }
      ]
    };

    // Update service options when package changes
    document.getElementById("package").addEventListener("change", function() {
      const selectedPackage = this.value;
      const serviceSelect = document.getElementById("service");
      
      // Clear current service options
      serviceSelect.innerHTML = '<option value="">-- Chọn dịch vụ --</option>';

      // Add new service options if available
      if (serviceOptions[selectedPackage]) {
        serviceOptions[selectedPackage].forEach(opt => {
          const option = document.createElement("option");
          option.value = opt.value;
          option.text = opt.text;
          serviceSelect.appendChild(option);
        });
      }
    });

    // Form validation
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Get form values
      const mobile = document.getElementById('mobile').value;
      const name = document.getElementById('customer_name').value;
      const selectedTime = document.getElementById('selected_time').value;
      const package = document.getElementById('package').value;
      const service = document.getElementById('service').value;
      
      // Simple validation
      if (!mobile || !name || !selectedTime || !package || !service) {
        document.getElementById('errorMessage').style.display = 'block';
        document.getElementById('errorMessage').textContent = 'Vui lòng điền đầy đủ thông tin bắt buộc';
        
        // Hide error after 3 seconds
        setTimeout(() => {
          document.getElementById('errorMessage').style.display = 'none';
        }, 3000);
        
        return;
      }
      
      // If valid, show success message (in a real app, you'd submit to server)
      document.getElementById('successMessage').style.display = 'block';
      document.getElementById('successMessage').textContent = 'Đặt lịch thành công! Chúng tôi sẽ liên hệ với bạn sớm.';
      
      // In a real application, you would submit the form data to your server here
      console.log('Form submitted successfully');
    });

    // Initialize page
    window.onload = function() {
      updateDates();
      
      // Set default to evening time slots
      const eveningBtn = document.querySelector('.btn-group .btn:nth-child(3)');
      setActive(eveningBtn, 'evening');
    };
  </script>
  
</body>
</html>