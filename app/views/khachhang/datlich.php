<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đặt lịch hẹn | Spa Management  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      margin: 0;
      padding: 0;
      background-color: #f8f8f8;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    .header {
      text-align: center;
      margin-bottom: 30px;
    }
    .logo {
      max-width: 120px;
      margin-bottom: 10px;
    }
    h1 {
      color: #0078d4;
      margin: 10px 0;
    }
    .info {
      text-align: center;
      font-size: 14px;
      margin-bottom: 20px;
    }
    .nav {
      display: flex;
      justify-content: center;
      border-bottom: 1px solid #ddd;
      margin-bottom: 30px;
    }
    .nav-item {
      padding: 10px 20px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
    .nav-item.active {
      border-bottom: 2px solid #0078d4;
      color: #0078d4;
    }
    .form-container {
      background-color: #fff;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-title {
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }
    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
    }
    .booking-form {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
    }

    .form-title {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .form-group {
      margin-bottom: 20px;
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
      background: #f0f0f0;
      padding: 8px 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .country-code .flag {
      width: 20px;
      height: auto;
    }

    .name-group {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .select-gender {
      width: 30%;
      min-width: 100px;
  }

  input.form-control,
  select.form-control {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
  }

    .locations {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }
    .location-card {
      flex: 1;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 10px;
      text-align: center;
      cursor: pointer;
    }
    .location-card.selected {
      border-color: #0078d4;
      background-color: #e6f3ff;
    }
    .date-selector {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }
    .date-card {
      flex: 1;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 10px;
      text-align: center;
      cursor: pointer;
    }
    .date-card.selected {
      border-color: #0078d4;
      background-color: #e6f3ff;
    }
    .date-label {
      font-size: 12px;
      color: #666;
    }
    .date-day {
      font-size: 16px;
      font-weight: bold;
      margin: 5px 0;
    }
    .date-date {
      font-size: 14px;
      color: #333;
    }
    .time-selector {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      gap: 5px;
      margin-bottom: 20px;
    }
    .time-slot {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 5px;
      text-align: center;
      font-size: 14px;
      cursor: pointer;
    }
    .time-slot.selected {
      border-color: #0078d4;
      background-color: #e6f3ff;
    }
    .time-slot.available {
      color: #333;
    }
    .time-slot.booked {
      color: #999;
      background-color: #f5f5f5;
      cursor: not-allowed;
    }
    .btn {
      display: inline-block;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      text-align: center;
    }
    .btn-primary {
      background-color: #0078d4;
      color: white;
      width: 100%;
    }
    .btn-outline {
      background-color: transparent;
      border: 1px solid #ddd;
      color: #333;
    }
    .btn-group {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
    }
    .btn-group .btn {
      flex: 1;
    }
    .error {
      color: red;
      margin-bottom: 10px;
      font-size: 14px;
    }
    .success {
      color: green;
      margin-bottom: 10px;
      font-size: 14px;
    }
    .footer {
      text-align: center;
      margin-top: 20px;
      font-size: 12px;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Spa Management</h1>
      <div class="info">
        <div>Giờ mở cửa: 09:00 - 22:00</div>
        <div>Điện thoại: 0xxx.xxx.xxx</div>
      </div>
    </div>
    
    <div class="nav">
      <a href="#" class="nav-item active">ĐẶT LỊCH</a>
    </div>
    
    <div class="form-container">
      <?php if (!empty($error)): ?>
        <div class="error"><?php echo $error; ?></div>
      <?php endif; ?>
      
      <?php if (!empty($success)): ?>
        <div class="success"><?php echo $success; ?></div>
      <?php endif; ?>
      
      <div class="booking-form">
        <p class="form-title">Quý khách vui lòng cho biết thông tin</p>

        <div class="form-group phone-group">
          <div class="country-code">
            <img src="public/uploads/vietnam-flag.jpg" alt="Vietnam" class="flag" />
            <span>+84</span>
            <i class="fa fa-chevron-down"></i>
          </div>
          <input type="tel" name="mobile" placeholder="Số điện thoại" id="mobile" class="form-control" min="0" />
        </div>

        <div class="form-group name-group">
          <select id="gender" name="gender" class="form-control select-gender">
            <option value="F" selected>Chị</option>
            <option value="M">Anh</option>
          </select>
          <input type="text" name="customer_name" maxlength="50" placeholder="Họ Và Tên" id="customer_name" class="form-control" />
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
      <div class="form-group">
      <div class="form-title" style="display: flex; justify-content: space-between; align-items: center;">
          <span>Thời gian đặt lịch:</span>
          <span id="current-date-display" style="font-weight: normal; font-size: 14px; color: #555;"></span>
      </div>
      <script>
        const weekadays = ['Chủ Nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'];

        function updateDates() {
          for (let i = 0; i < 3; i++) {
            const date = new Date();
            date.setDate(date.getDate() + i);

            const dayName = weekadays[date.getDay()];
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();

            document.getElementById(`day${i + 1}`).textContent = dayName;
            document.getElementById(`date${i + 1}`).textContent = `${day}/${month}`;
            document.getElementById(`input${i + 1}`).value = `${day}/${month}/${year}`;
          }

          // Cập nhật ngày hiện tại bên cạnh tiêu đề
          const now = new Date();
          const nowDay = weekdays[now.getDay()];
          const nowDate = String(now.getDate()).padStart(2, '0');
          const nowMonth = String(now.getMonth() + 1).padStart(2, '0');
          const nowYear = now.getFullYear();

          document.getElementById("current-date-display").textContent = 
            `Hôm nay: ${nowDay}, ${nowDate}/${nowMonth}/${nowYear}`;
        }

        window.onload = updateDates;
      </script>

      
        <div class="date-selector">
          <div class="date-card selected" onclick="selectDate('date1')">
            <div class="date-label">Hôm Nay</div>
            <div class="date-day" id="day1"></div>
            <div class="date-date" id="date1"></div>
            <input type="radio" name="date" id="input1" value="" checked style="display: none;">
          </div>
          <div class="date-card" onclick="selectDate('date2')">
            <div class="date-label">Ngày Mai</div>
            <div class="date-day" id="day2"></div>
            <div class="date-date" id="date2"></div>
            <input type="radio" name="date" id="input2" value="" style="display: none;">
          </div>
          <div class="date-card" onclick="selectDate('date3')">
            <div class="date-label">Ngày Kia</div>
            <div class="date-day" id="day3"></div>
            <div class="date-date" id="date3"></div>
            <input type="radio" name="date" id="input3" value="" style="display: none;">
          </div>
        </div>
      </div>
      <script>
          const weekdays = ['Chủ Nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'];

          function updateDates() {
            for (let i = 0; i < 3; i++) {
              const date = new Date();
              date.setDate(date.getDate() + i); // ngày hiện tại, +1, +2

              const now = new Date();
              const dayName = weekdays[date.getDay()];
              const day = String(date.getDate()).padStart(2, '0');
              const month = String(date.getMonth() + 1).padStart(2, '0');
              const year = date.getFullYear();

              document.getElementById(`day${i + 1}`).textContent = dayName;
              document.getElementById(`date${i + 1}`).textContent = `${day}/${month}`;
              document.getElementById(`input${i + 1}`).value = `${day}/${month}/${year}`;
            }
          }

          window.onload = updateDates;
        </script>
        


        <div class="form-group">
          <div class="btn-group">
            <button type="button" class="btn btn-outline">Buổi sáng</button>
            <button type="button" class="btn btn-outline">Buổi chiều</button>
            <button type="button" class="btn btn-outline">Buổi tối</button>
          </div>
        </div>
        
        <div class="form-group">
          <div class="form-title">Chọn khung giờ phục vụ (*):</div>
          <div class="time-selector">
            <div class="time-slot" onclick="selectTime('18:00')">18:00<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="18:00" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('18:15')">18:15<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="18:15" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('18:30')">18:30<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="18:30" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('18:45')">18:45<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="18:45" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('19:00')">19:00<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="19:00" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('19:15')">19:15<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="19:15" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('19:30')">19:30<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="19:30" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('19:45')">19:45<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="19:45" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('20:00')">20:00<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="20:00" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('20:15')">20:15<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="20:15" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('20:30')">20:30<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="20:30" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('20:45')">20:45<br><span class="availability">Hẹn nhé</span>
              <input type="radio" name="time" value="20:45" style="display: none;">
            </div>
            <div class="time-slot selected" onclick="selectTime('21:00')">21:00<br><span class="availability">Còn nhé</span>
              <input type="radio" name="time" value="21:00" checked style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('21:15')">21:15<br><span class="availability">Còn nhé</span>
              <input type="radio" name="time" value="21:15" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('21:30')">21:30<br><span class="availability">Còn nhé</span>
              <input type="radio" name="time" value="21:30" style="display: none;">
            </div>
            <div class="time-slot" onclick="selectTime('21:45')">21:45<br><span class="availability">Còn nhé</span>
              <input type="radio" name="time" value="21:45" style="display: none;">
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <div class="form-title">Chọn gói dịch vụ:</div>
          <select id="package" class="form-control">
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
          <div class="form-title">Chọn dịch vụ:</div>
          <select id="service" name="service" class="form-control">
            <option value="">-- Chọn dịch vụ --</option>
          </select>
        </div>

        <script>
          const serviceOptions = {
            goidacbiet: [
              { value: "thugiancaocap", text: "Gói Thư Giãn Cao Cấp - 90'" },
              { value: "maymong", text: "Gói Mây Mộng - 90'" },
              { value: "taitao", text: "Gói Tái Tạo Năng Lượng - 2 giờ 15'" },
              { value: "anlanh", text: "Gói Ngày An Lành - 4 giờ 05'" }
            ],
            massage4tay: [
              { value: "massage4tay", text: "Massage 4 tay - 60'" },
            ],
            khoanhkhacthugian: [
              { value: "khoanhkhacthugian", text: "Massage đầu, cổ, lưng & vai - 45'" },
              { value: "khoanhkhacthugian2", text: "Massage tay, đầu, cổ & vai - 30'" },
              { value: "khoanhkhacthugian3", text: "Massage chân - 30'" }
            ],
            chamsocdamat: [
              { value: "chamsocdamat", text: "Chăm sóc da mặt cơ bản - 45" },
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

          document.getElementById("package").addEventListener("change", function () {
            const selected = this.value;
            const serviceSelect = document.getElementById("service");
            
            // Xóa tất cả dịch vụ hiện tại
            serviceSelect.innerHTML = '<option value="">-- Chọn dịch vụ --</option>';

            // Thêm dịch vụ mới nếu có
            if (serviceOptions[selected]) {
              serviceOptions[selected].forEach(opt => {
                const option = document.createElement("option");
                option.value = opt.value;
                option.text = opt.text;
                serviceSelect.appendChild(option);
              });
            }
          });
        </script>

        <div class="form-group">
          <div class="form-title">Ghi chú:</div>
          <?php $notes ??= ''; ?>
          <textarea name="notes" class="form-control" rows="4" placeholder="Ghi chú"><?php echo $notes; ?></textarea>
          
        </div>
        
        
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-calendar-check"></i> Đặt lịch hẹn
        </button>
      </form>
    </div>
    
  </div>

  <script>
    function selectLocation(location) {
      // Remove selected class from all locations
      document.querySelectorAll('.location-card').forEach(function(el) {
        el.classList.remove('selected');
      });
      
      // Add selected class to clicked location
      document.querySelector('[value="' + location + '"]').parentNode.classList.add('selected');
      
      // Check the radio button
      document.querySelector('[value="' + location + '"]').checked = true;
    }
    
    function selectDate(date) {
      // Remove selected class from all dates
      document.querySelectorAll('.date-card').forEach(function(el) {
        el.classList.remove('selected');
      });
      
      // Add selected class to clicked date
      document.querySelector('[value="' + date + '"]').parentNode.classList.add('selected');
      
      // Check the radio button
      document.querySelector('[value="' + date + '"]').checked = true;
    }
    
    function selectTime(time) {
      // Remove selected class from all times
      document.querySelectorAll('.time-slot').forEach(function(el) {
        el.classList.remove('selected');
      });
      
      // Add selected class to clicked time
      document.querySelector('[value="' + time + '"]').parentNode.classList.add('selected');
      
      // Check the radio button
      document.querySelector('[value="' + time + '"]').checked = true;
    }
  </script>
  
</body>
</html>