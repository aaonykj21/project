<!DOCTYPE html>
<html lang="th">
    <meta charset="UTF-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="codeCSS/page2.css">
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

<body>
    <header>
        <h1>คำสั่งซื้อ</h1>
        <div style="display: flex;">
            <i class="bi bi-house-door" style="font-size: 30px; margin-right: 10px;"
                onclick="window.location.href='tap.html'"></i>
            <i class="bi bi-basket" style="font-size: 30px;" onclick="window.location.href='cart.php'"></i>
        </div>
        <div class="clockTime">
            <div id="clock"></div>
        </div>
        <div class="clockTime">
            <div id="clock"></div>
        </div>
    </header><br>
    <div class="button-next-1">
        <div class="button-page" onclick="window.location.href='page1.php'">
            <i class="bi bi-1-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='page2.php'">
            <i class="bi bi-2-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='page3.php'">
            <i class="bi bi-3-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='page4.php'">
            <i class="bi bi-4-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='page5.php'">
            <i class="bi bi-5-circle-fill"></i>
        </div>
        <div class="button-page" onclick="window.location.href='sum_order.php'">
            <i class="bi bi-6-circle-fill"></i>
        </div>
    </div>
    <br>
    <div class="button-next-next">
        <div class="button-next-page" onclick="window.location.href='page3.php'">ต่อไป
        </div>
        <h1 style="color: #FFC20D; margin-bottom: 5px;">เลือกเนื้อสัตว์</h1>
        <h4 style="margin-top: 5px;color:#D9D9D9;">เลือกได้ 2 อย่าง</h4>
    </div>
    <form action="/submit_form" method="post">
        <div class="button-container">
            <div class="button-slide">
                <button type="button" name="meat" value="เบคอน">
                    <img src="img/meat/bacon.png"><br>เบคอน<br>+30บาท</button>
                <input type="hidden" name="meat-quantity[]" value="0">
                <button type="button" name="meat" value="สเต็กเนื้อ">
                    <img src="img/meat/beef.png"><br>สเต็กเนื้อ<br>+30บาท</button>
                <input type="hidden" name="meat-quantity[]" value="0">
                <button type="button" name="meat" value="ทูน่า">
                    <img src="img/meat/tuna.png"><br>ทูน่า<br>+20บาท</button>
                <input type="hidden" name="meat-quantity[]" value="0">
                <button type="button" name="meat" value="ไก่บูลโกกิ">
                    <img src="img/meat/chicken.png"><br>ไก่บูลโกกิ<br>+20บาท</button>
                <input type="hidden" name="meat-quantity[]" value="0">
                <button type="button" name="meat" value="แฮมหมู">
                    <img src="img/meat/ham.png"><br>แฮมหมู<br>+30บาท</button>
                <input type="hidden" name="meat-quantity[]" value="0">
                <button type="button" name="meat" value="เปปเปอโรนี"><img
                        src="img/meat/pepper.png"><br>เปปเปอโรนี<br>+30บาท</button>
                <input type="hidden" name="meat-quantity[]" value="0">
            </div>
        </div>
        <br>
        <!--button type="button" id="add-button">Add to Cart</button>
      <button type="submit">Submit</button-->
    </form>

    <div class="button-left">
        <i id="prev-button" class="bi bi-chevron-left"></i>
    </div>
    <div class="button-right">
        <i id="next-button" class="bi bi-chevron-right"></i>
    </div>
    <div id="selected-items">
        <ul id="selected-list"></ul>
    </div>

    <script>
        const buttons = document.querySelectorAll('button[name="meat"]');
        const hiddenInputs = document.querySelectorAll('input[name="meat-quantity[]"]');
        const selectedList = document.getElementById('selected-list');
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');
        const addButton = document.getElementById('add-button');
        const buttonSlide = document.querySelector('.button-slide');

        let selectedMeats = JSON.parse(localStorage.getItem('selectedMeats')) || [],
            slidePosition = 0;

        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                const numSelected = selectedMeats.length;
                if (button.classList.contains('active')) {
                    hiddenInputs[index].value = 0;
                    button.classList.remove('active');
                    const indexToRemove = selectedMeats.indexOf(button.value);
                    if (indexToRemove !== -1) {
                        selectedMeats.splice(indexToRemove, 1);
                    }
                } else if (numSelected < 2) {
                    hiddenInputs[index].value = 1;
                    button.classList.add('active');
                    selectedMeats.push(button.value);
                }
                updateSelectedItems();
                localStorage.setItem('selectedMeats', JSON.stringify(selectedMeats));
            });
        });
        function updateSelectedItems() {
            const selectedMeats = document.querySelectorAll('.active');
            let selectedItemsText = '';
            selectedMeats.forEach((selectedMeat, index) => {
                const value = selectedMeat.getAttribute('value');
                selectedItemsText += `${value}`;
            });
            localStorage.setItem('selectedMeats', JSON.stringify(Array.from(selectedMeats).map(meat => meat.getAttribute('value'))));
        }

        // Load selected meats from localStorage on page load
        window.addEventListener('load', () => {
            const selectedMeats = JSON.parse(localStorage.getItem('selectedMeats')) || [];
            selectedMeats.forEach(meat => {
                const button = document.querySelector(`button[name="meat"][value="${meat}"]`);
                if (button) {
                    button.classList.add('active');
                    const index = Array.from(buttons).indexOf(button);
                    hiddenInputs[index].value = 1;
                }
            });
            updateSelectedItems();
        });
        nextButton.addEventListener('click', () => {
            slidePosition -= 320 * 4; // เลื่อนไปที่ตำแหน่งของ 4 ปุ่มถัดไป
            const numSlides = Math.ceil(buttonSlide.children.length / 6);
            if (slidePosition <= -745) {
                slidePosition = -745; // กลับไปที่สไลด์สุดท้ายหากเลื่อนไปเกินจำนวนสไลด์ทั้งหมด
                nextButton.style.display = 'none'; // ซ่อนปุ่มถัดไปเมื่ออยู่ที่สไลด์สุดท้าย
            }
            buttonSlide.style.left = `${slidePosition}px`; // กำหนดให้สไลด์เลื่อนไปที่ตำแหน่งใหม่
            prevButton.style.display = 'inline'; // แสดงปุ่มย้อนกลับเมื่อสไลด์ถูกเลื่อน
        });

        prevButton.addEventListener('click', () => {
            slidePosition += 320 * 4; // เลื่อนไปที่ตำแหน่งของ 4 ปุ่มก่อนหน้า
            if (slidePosition >= 0) {
                slidePosition = 0; // กลับไปที่เริ่มต้นหากเลื่อนไปเกินจำนวนสไลด์ทั้งหมด
                prevButton.style.display = 'none'; // ซ่อนปุ่มย้อนกลับเมื่ออยู่ที่สไลด์เริ่มต้น
            }
            buttonSlide.style.left = `${slidePosition}px`; // กำหนดให้สไลด์เลื่อนไปที่ตำแหน่งใหม่
            nextButton.style.display = 'inline'; // แสดงปุ่มถัดไปเมื่อสไลด์ถูกเลื่อน
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