<!DOCTYPE html>
<html>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="codeCSS/page1.css">
<body>
  <header>
    <h1>คำสั่งซื้อ</h1>
    <div style="display: flex;">
      <i class="bi bi-house-door" style="font-size: 30px; margin-right: 10px;"
        onclick="window.location.href='tap.html'"></i>
      <i class="bi bi-basket" style="font-size: 30px;" onclick="window.location.href='cart.html'"></i>
    </div>
    <div class="clockTime">
        <div id="clock"></div>
    </div>
  </header><br>
  <div class="button-next-1">
    <div class="button-page" onclick="window.location.href='page1.html'">
      <i class="bi bi-1-circle-fill"></i>
    </div>
    <div class="button-page" onclick="window.location.href='page2.html'">
      <i class="bi bi-2-circle-fill"></i>
    </div>
    <div class="button-page" onclick="window.location.href='page3.html'">
      <i class="bi bi-3-circle-fill"></i>
    </div>
    <div class="button-page" onclick="window.location.href='page4.html'">
      <i class="bi bi-4-circle-fill"></i>
    </div>
    <div class="button-page" onclick="window.location.href='page5.html'">
      <i class="bi bi-5-circle-fill"></i>
    </div>
    <div class="button-page" onclick="window.location.href='sum_order.html'">
      <i class="bi bi-6-circle-fill"></i>
    </div>
  </div>
  <br>
  <div class="button-next-next">
    <div class="button-next-page" onclick="window.location.href='page2.html'">ต่อไป
    </div>
    <h1 style="color: #FFC20D; margin-bottom: 5px;">เลือกขนมปัง</h1>
    <h4 style="margin-top: 5px;color:#D9D9D9;">เลือกได้ 1 อย่าง</h4>
  </div>
  <form action="/submit_form" method="post">
    <div class="button-container">
      <div class="button-slide">
        <button type="button" name="bread" value="wheat"><img src="bread/wheat.png" width="150" height="100"><br>วีท<br>+20บาท</button>
        <input type="hidden" name="bread-quantity[]" value="1">
        <button type="button" name="bread" value="honeyoat"><img src="bread/honeyoat.png" width="150" height="100"><br>ฮันนี่ โอ๊ต<br>+30บาท</button>
        <input type="hidden" name="bread-quantity[]" value="1">
        <button type="button" name="bread" value="sesame"><img src="bread/sesame.png" width="150" height="100"><br>เซซามี<br>+30บาท</button>
        <input type="hidden" name="bread-quantity[]" value="1">
        <button type="button" name="bread" value="pamesanoregano"><img src="bread/pamesan.png" width="150" height="100"><br>พาร์เมซาน ออริกาโน<br>+30บาท</button>
        <input type="hidden" name="bread-quantity[]" value="1">
      </div>
    </div>
  </form>
 <br>
  <script>
    const buttons = document.querySelectorAll('button[name="bread"]');
    const hiddenInputs = document.querySelectorAll('input[name="bread-quantity[]"]');

    let selectedBread = JSON.parse(localStorage.getItem('selectedBread')) || [];

    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const numSelected = selectedBread.length;
            if (button.classList.contains('active')) {
                hiddenInputs[index].value = 0;
                button.classList.remove('active');
                const indexToRemove = selectedBread.indexOf(button.value);
                if (indexToRemove !== -1) {
                  selectedBread.splice(indexToRemove, 1);
                }
            } else if (numSelected < 1) {
                hiddenInputs[index].value = 0;
                button.classList.add('active');
                selectedBread.push(button.value);
            }
            updateSelectedItems();
            localStorage.setItem('selectedBread', JSON.stringify(selectedBread));
        });
    });
    function updateSelectedItems() {
        const selectedBread = document.querySelectorAll('.active');
        let selectedItemsText = '';
        selectedBread.forEach((selectedBread, index) => {
            const value = selectedBread.getAttribute('value');
            selectedItemsText += `${value}`;

        });

        localStorage.setItem('selectedBread', JSON.stringify(Array.from(selectedBread).map(bread => bread.getAttribute('value'))));
    }



    // เพิ่มในส่วนที่จะเรียกใช้งานหน้าอื่น
    window.addEventListener('load', () => {
        const selectedBread = JSON.parse(localStorage.getItem('selectedBread')) || [];
        selectedBread.forEach(bread => {
            const button = document.querySelector(`button[name="bread"][value="${bread}"]`);
            if (button) {
                button.classList.add('active');
                const index = Array.from(buttons).indexOf(button);
                hiddenInputs[index].value = 1;
            }
        });
        updateSelectedItems();
    });
    // ตรวจสอบว่าเนื้อสัตว์ไหนถูกเลือกไว้แล้ว
    selectedBread.forEach((bread) => {
        const button = document.querySelector(`button[name="bread"][value="${bread}"]`);
        if (button) {
            button.classList.add('active');
            const index = Array.from(buttons).indexOf(button);
            hiddenInputs[index].value = 1;
        }
    });
    function updateClock() {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds();

hours = hours < 10 ? '0' + hours : hours;
minutes = minutes < 10 ? '0' + minutes : minutes;
seconds = seconds < 10 ? '0' + seconds : seconds;

var timeString = hours + ':' + minutes + ':' + seconds;
document.getElementById('clock').innerHTML = timeString;
}

setInterval(updateClock, 1000); // อัพเดทเวลาทุกๆ 1 วินาที
updateClock(); // เรียกใช้ฟังก์ชันเพื่อแสดงเวลาครั้งแรกทันทีเมื่อหน้าเว็บโหลด
</script>
</body>

</html>
