<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="codeCSS/page4.css">
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

<body>
    <header>
        <h1>คำสั่งซื้อ</h1>
        <div style="display: flex;">
            <i class="bi bi-house-door" style="font-size: 30px; margin-right: 10px;"
                onclick="window.location.href='tap.html'"></i>
            <i class="bi bi-basket" style="font-size: 30px;" onclick="window.location.href='cart.html'"></i>
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
    </div><br>
    <div class="button-next-next">
        <div class="button-next-page" onclick="window.location.href='page5.html'">ต่อไป
        </div>
        <h1 style="color: #FFC20D; margin-bottom: 5px;">เลือกขนมปัง</h1>
        <h4 style="margin-top: 5px;color:#D9D9D9;">เลือกได้มากกว่า 1 อย่าง</h4>
    </div>
    <form action="/submit_form" method="post">
        <div class="button-container">
            <div class="button-slide">
                <button type="button" name="sauce" value="ไม่เลือก">
                    <img src="img/sauce/icon1.png"><br><br>ไม่เลือก</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="ซอสมะเขือเทศ">
                    <img src="img/sauce/ketchup.png"><br>ซอสมะเขือเทศ<br>ฟรี</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="มายองเนส">
                    <img src="img/sauce/mayon.png"><br>มายองเนส<br>ฟรี</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="บาร์บีคิว">
                    <img src="img/sauce/bbq.png"><br>บาร์บีคิว<br>+10บาท</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="ซีซาร์">
                    <img src="img/sauce/seasar.png"><br>ซีซาร์<br>+10บาท</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="เชดด้าชีส">
                    <img src="img/sauce/cheese.png"><br>เชดด้าชีส<br>+10บาท</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="ชิลลี่"><img
                        src="img/sauce/chilli.png"><br>ชิลลี่<br>+10บาท</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="ฮันนี่มัสตาร์ด">
                    <img src="img/sauce/honeymustard.png"><br>ฮันนี่มัสตาร์ด<br>+10บาท</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="สไปซี่มาโย">
                    <img src="img/sauce/spicymayo.png"><br>สไปซี่มาโย<br>+10บาท</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="สวีทออนเนี่ยน">
                    <img src="img/sauce/sweetonian.png"><br>สวีทออนเนี่ยน<br>+10บาท</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
                <button type="button" name="sauce" value="สวีทชิลลี่">
                    <img src="img/sauce/sweetchilli.png"><br>สวีทชิลลี่<br>+10บาท</button>
                <input type="hidden" name="sauce-quantity[]" value="0">
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
        const buttons = document.querySelectorAll('button[name="sauce"]');
        const hiddenInputs = document.querySelectorAll('input[name="sauce-quantity[]"]');
        const selectedList = document.getElementById('selected-list');
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');
        const addButton = document.getElementById('add-button');
        const buttonSlide = document.querySelector('.button-slide');

        let selectedSauce = JSON.parse(localStorage.getItem('selectedSauce')) || [],
            slidePosition = 0;

        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                hiddenInputs[index].value = parseInt(hiddenInputs[index].value) + 1;
                button.classList.toggle('active');

                if (button.classList.contains('active')) {
                    selectedSauce.push(button.value);
                } else {
                    const indexToRemove = selectedSauce.indexOf(button.value);
                    if (indexToRemove !== -1) {
                        selectedSauce.splice(indexToRemove, 1);
                    }
                }
                updateSelectedItems();
                localStorage.setItem('selectedSauce', JSON.stringify(selectedSauce));
            });
        });

        // ตรวจสอบว่าเนื้อสัตว์ไหนถูกเลือกไว้แล้ว
        selectedSauce.forEach((sauce) => {
            const button = document.querySelector(`button[name="sauce"][value="${sauce}"]`);
            if (button) {
                button.classList.add('active');
                const index = Array.from(buttons).indexOf(button);
                hiddenInputs[index].value = 1;
            }
        });
        function updateSelectedItems() {
            const selectedSauce = document.querySelectorAll('.active');
            let selectedItemsText = '';
            selectedSauce.forEach((selectedSauce, index) => {
                const value = selectedSauce.getAttribute('value');
                selectedItemsText += `${value}`;

            });

            localStorage.setItem('selectedSauce', JSON.stringify(Array.from(selectedSauce).map(sauce => sauce.getAttribute('value'))));
        }



        // เพิ่มในส่วนที่จะเรียกใช้งานหน้าอื่น
        window.addEventListener('load', () => {
            const selectedSauce = JSON.parse(localStorage.getItem('selectedSauce')) || [];
            selectedSauce.forEach(sauce => {
                const button = document.querySelector(`button[name="sauce"][value="${sauce}"]`);
                if (button) {
                    button.classList.add('active');
                    const index = Array.from(buttons).indexOf(button);
                    hiddenInputs[index].value = 1;
                }
            });
            updateSelectedItems();
        });
        nextButton.addEventListener('click', () => {
            slidePosition -= 372 * 4; // ขยับไปที่ตำแหน่งของ 4 ปุ่มถัดไป
            const numSlides = Math.ceil(buttonSlide.children.length / 4);
            if (slidePosition <= -320 * (numSlides * 2 - 4)) {
                slidePosition = -372 * (numSlides * 2 - 4); // กลับไปที่สไลด์สุดท้ายหากเลื่อนไปเกินจำนวนสไลด์ทั้งหมด
                nextButton.style.display = 'none'; // ซ่อนปุ่มถัดไปเมื่ออยู่ที่สไลด์สุดท้าย
            }
            buttonSlide.style.left = `${slidePosition}px`; // กำหนดให้สไลด์เลื่อนไปที่ตำแหน่งใหม่
            prevButton.style.display = 'inline'; // แสดงปุ่มย้อนกลับเมื่อสไลด์ถูกเลื่อน
        });


        prevButton.addEventListener('click', () => {
            slidePosition += 372 * 4; // เลื่อนไปที่ตำแหน่งของ 4 ปุ่มก่อนหน้า
            if (slidePosition >= 0) {
                slidePosition = 0; // กลับไปที่เริ่มต้นหากเลื่อนไปเกินจำนวนสไลด์ทั้งหมด
                prevButton.style.display = 'none'; // ซ่อนปุ่มย้อนกลับเมื่ออยู่ที่สไลด์เริ่มต้น
            }
            buttonSlide.style.left = `${slidePosition}px`; // กำหนดให้สไลด์เลื่อนไปที่ตำแหน่งใหม่
            nextButton.style.display = 'inline'; // แสดงปุ่มถัดไปเมื่อสไลด์ถูกเลื่อน
        });
    </script>
</body>

</html>