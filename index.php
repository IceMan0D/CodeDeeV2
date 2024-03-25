<?php session_start();
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodeDee</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- bootstarp icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/object.css">
  <link rel="stylesheet" href="css/navbar.css">

  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

</head>

<body>
  <?php include "navbar.php" ?>

  <!-- intro -->
  <div class="container intro pb-5">
    <div class="row my-5">
      <div class="col-12 col-lg-7 intro-left text-start px-5 px-md-0">
        <h1>ก้าวสู่สายงาน <span class="typewriter highlight" id="typewriter">
            <h1>Programmer.</h1>
          </span>เรียนกับ
          <span class="text-warning highlight">CodeDee</span>
        </h1>
        <h4 class="my-3">สร้างสรรค์แอปพลิเคชัน และ ผลงานด้านดิจิทัล ด้วยหลักสูตรที่ลงลึกจัดเต็ม<br>
          ผู้มีประสบการณ์เชี่ยวชาญด้านเทคโนโลยีตัวจริงได้เลย</h4>
        <div class="button-container mb-3 row gap-3">
          <a href="product.php?course_type=1" class="btn btn-course col-5 col-lg py-2 d-flex flex-column justify-content-center" style="height: 45px;"><span>🚀 Web-Dev</span></a>
          <a href="product.php?course_type=2" class="btn btn-course col-5 col-lg py-2 d-flex flex-column justify-content-center" style="height: 45px;">🐳 Mobile-Dev</a>
          <a href="product.php?course_type=3" class="btn btn-course col-5 col-lg py-2 d-flex flex-column justify-content-center" style="height: 45px;">👾 Game-Dev</a>
          <a href="product.php?course_type=4" class="btn btn-course col-5 col-lg py-2 d-flex flex-column justify-content-center" style="height: 45px;">🤖 Data-Analytic</a>
        </div>
        <a href="" class="text-decoration-none text-warning fw-bold fs-5 link-course">😎 เลือกดูคอร์สทั้งหมด -></a>
      </div>
      <div class="col-md-5 intro-right d-none d-lg-block">
        <div class="main d-flex flex-column align-items-center justify-content-center follow h-100">
          <div class="up">
            <a href="product.php?course_type=1">
              <button class="card1" id="card1">
                <img src="images/app-development.png" alt="" class="instagram w-25">
              </button>
            </a>
            <a href="product.php?course_type=2">
              <button class="card2" id="card2">
                <img src="images/development.png" alt="" class="twitter w-25">
              </button>
            </a>
          </div>
          <div class="down">
            <a href="product.php?course_type=3">
              <button class="card3" id="card3">
                <img src="images/game-controller.png" alt="" class="github w-25">
              </button>
            </a>
            <a href="product.php?course_type=4">
              <button class="card4" id="card4">
                <img src="images/growth.png" alt="" class="discord w-25">
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>

    <script>
      const typewriter = document.getElementById("typewriter")
      const card1 = document.getElementById("card1");
      const card2 = document.getElementById("card2");
      const card3 = document.getElementById("card3");
      const card4 = document.getElementById("card4");

      function changeTextAndAnimate(newText) {
        typewriter.style.animation = 'none';
        void typewriter.offsetWidth;
        typewriter.textContent = newText;
        typewriter.style.animation = null;
      }
      card1.addEventListener("mouseover", function() {
        changeTextAndAnimate("Web Deverloper.");
      });
      card2.addEventListener("mouseover", function() {
        changeTextAndAnimate("Mobile Deverloper.");
      });
      card3.addEventListener("mouseover", function() {
        changeTextAndAnimate("Game Deverloper.");
      });
      card4.addEventListener("mouseover", function() {
        changeTextAndAnimate("Data Analytics");
      });
    </script>

  </div>



  <div class="container-fluid bg-dark text-white py-4">
    <div class="container">
      <div class="row py-3">
        <div class="col-12 col-lg-6 py-2">
          <video width="320" height="240" autoplay class="w-75 h-100  mx-auto d-block">
            <source src="images/pexels_videos_2278095 (1080p).mp4" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-center ">
          <div class="text-center text-lg-start mx-auto mx-lg-0">
            <h1 class="text-warning highlight">CodeDee</h1>
            <h1>ระบบฝึกทักษะ การเขียนโปรแกรม
              <br> ที่พร้อมตรวจผลงานคุณ 24 ชั่วโมง
            </h1>
            <ul class="list-unstyled">
              <li>โจทย์ปัญหากว่า 200 ข้อ ที่รอท้าทายคุณอยู่</li>
              <li>รองรับ 9 ภาษาโปรแกรมหลัก ไม่ว่าจะ Java, Python, C ก็เขียนได้</li>
              <li>ใช้งานได้ฟรี ! ครบ 20 ข้อขึ้นไป รับ Certificate ไปเลย !!</li>
            </ul>
            <div class="button-container mt-3">
              <a style="--clr: #7808d0" class="button" href="#">
                <span class="button__icon-wrapper">
                  <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">
                    <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z">
                    </path>
                  </svg>

                  <svg class="button__icon-svg  button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">
                    <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z">
                    </path>
                  </svg>
                </span>
                สมัครเรียนเลยทันที
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- discover -->
  <div class="container-fluid py-5">
    <div class="container discover">

      <div class="top mb-5">
        <h2>คอร์สแนะนำจาก</h2>
        <h1 class="highlight">CodeDee</h1>
        <p>คอร์สเรียนเขียนโปรแกรม และ เทคโนโลยีที่เปิดกว้างสำหรับทุกคนให้ได้เข้า เรียนฟรี ไม่มีค่าใช้จ่ายให้ต้องกังวล
          <br>เพื่อการเรียนรู้ตลอดชีวิตที่สร้างสรรค์เน้นปฏิบัติจริง ผ่านระบบออนไลน์เข้าถึงได้ทุกที่ ทุกเวลา
        </p>
      </div>

      <div class="row">
        <div class="col-12 col-lg-4 course-column">
          <div class="column-content" style="background-color: rgb(255, 238, 206);">
            <a href="" class="column-link"></a>
            <h1>💻 Starting Design Website</h1>
            <p>เริ่มต้นออกแบบเว็บไซต์ของคุณด้วยความคิดสร้างสรรค์และการวางแผนอย่างมีระบบ เพื่อสร้างประสบการณ์ที่น่าสนใจและมีประสิทธิภาพสำหรับผู้เยี่ยมชมของคุณ! 🌐✨</p>
          </div>
        </div>
        <div class="col-12 col-lg-4 course-column">

          <div class="column-content text-white" style="background-color:#6a37ff;">
            <a href="" class="column-link"></a>
            <h1>👩‍💻 Became to FontEnd</h1>
            <p>เริ่มต้นเดินทางสู่การเป็น Frontend Developer ด้วยการเรียนรู้ HTML, CSS, และ JavaScript และเตรียมตัวให้พร้อมสร้างประสบการณ์การใช้งานที่น่าประทับใจบนเว็บไซต์! 🌟👩‍💻</p>
          </div>
        </div>
        <div class="col-12 col-lg-4 course-column">

          <div class="column-content text-white" style="background-color: coral;">
            <a href="" class="column-link"></a>
            <h1>💾 Introduce SQL Database</h1>
            <p>สนุกกับการเรียนรู้ SQL Database และคำสั่งพื้นฐาน เริ่มต้นกันเถอะ! 💾🌟 เข้าร่วมการสร้างและจัดการข้อมูลอย่างมีประสิทธิภาพด้วย SQL!</p>
          </div>
        </div>
        <div class="col-12 col-lg-6 course-column">

          <div class="column-content text-white" style="background-color: #2779e3;">
            <a href="" class="column-link"></a>
            <h1>🐳 Introduce Github for Deverloper</h1>
            <p>เข้าร่วมชุมชนนักพัฒนาโดยใช้ GitHub! รวบรวมโค้ด ทำงานร่วมกับทีม และติดตามการเปลี่ยนแปลงในโครงการได้อย่างสะดวกสบาย 🐳🚀</p>
          </div>
        </div>
        <div class="col-12 col-lg-6 course-column">

          <div class="column-content" style="background-color: rgb(255, 221, 0);">
            <a href="" class="column-link"></a>
            <h1>👾 Starting Game Deverloper</h1>
            <p>เริ่มต้นเป็นนักพัฒนาเกมกับการเรียนรู้เครื่องมือและทักษะที่จำเป็น! ค้นพบโลกของการสร้างเกม และเริ่มต้นการสร้างประสบการณ์ที่น่าตื่นเต้นสำหรับผู้เล่น! 👾🎮</p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="container-fluid contact">
    <div class="row contact-dsc d-flex flex-lg-row flex-column-reverse">
      <div class="col-12 col-lg-8 text-white p-5 " style="background: url(images/contact-bg.jpg); background-size: cover;">
        <div class="dsc-content d-flex flex-column align-items-center justify-content-center">
          <h1 class="text-center">หากคุณยังกังวลพวกเรา <br><span class="highlight">CodeDee</span><br> พร้อมจะให้คำแนะนำ</h1>
          <p>ก้าวสู่การเป็นโปรแกรมเมอร์ไปพร้อมกับพวกเราเลย</p>
          <a href="Login_User.php" class="btn btn-warning my-3">ลงทะเบียน</a>
        </div>

      </div>
      <div class="col-4 d-none d-lg-block p-5 contact-form">
        <img src="images/poster.png" alt="" class="w-100 border">
      </div>
    </div>
  </div>

  <?php include "footer.php" ?>

</body>
</html>