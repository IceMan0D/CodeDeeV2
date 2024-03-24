<header class="py-2 px-3 px-md-5 d-flex justify-content-end"
    style="background: -webkit-linear-gradient(0deg,  #106eea, #f203ff); top: 0px;">
    <i class="bi bi-facebook text-white" style="margin: auto 10px;"></i>
    <i class="bi bi-instagram text-white" style="margin: auto 10px;"></i>
    <i class="bi bi-linkedin text-white" style="margin: auto 10px;"></i>
</header>

<!-- nabbar -->
<nav class="navbar navbar-expand-lg mx-5 mx-lg-5 px-0 px-md-5 py-4 ">
    <div class="container-fluid p-0 ">
        <a class="navbar-brand me-3" href="index.php">
            <img src="images/CodeDee-logo-transformed 1.png" alt="" class="w-75">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav justify-content-between align-items-center w-100">

                <div class="d-flex flex-column flex-md-row mt-3 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            หมวดหมู่
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item py-2" href="product.php?course_type=1">Web Deverloper</a></li>
                            <li><a class="dropdown-item py-2" href="product.php?course_type=2">Mobile Deverloper</a>
                            </li>
                            <li><a class="dropdown-item py-2" href="product.php?course_type=3">Game Deverloper</a></li>
                            <li><a class="dropdown-item py-2" href="product.php?course_type=4">Ux/Ui Designer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            เกี่ยวกับ
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item py-2" href="aboutus.php">About Us</a></li>
                            <li><a class="dropdown-item py-2" href="mentor.php">Mentor</a></li>
                            <li><a class="dropdown-item py-2" href="#">Lerning</a></li>
                        </ul>
                    </li>
                </div>

                <div class="d-flex flex-column flex-md-row ">
                    <?php
                    // ดึง username จาก Database
                    // หากมีค่า session ให้ดึงข้อมูล
                    if (!empty($_SESSION['user_login'])) {
                        $user_id = $_SESSION['user_login'];
                        $sql = "SELECT user_username FROM user WHERE user_id = :user_id";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':user_id', $user_id);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                    <!-- หาก login แล้วให้มี ชื่อ  username แสดง -->
                    <?php if (isset($_SESSION['user_login'])) { ?>
                    <li class="nav-item dropdown d-flex flex-column justify-content-center ">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo $result['user_username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="edituser.php">จัดการบัญชี</a></li>
                            <li><a class="dropdown-item" href="Logout.php">ออกจากระบบ</a></li>
                        </ul>
                    </li>

                    <button class="p-0 px-3 text-start d-none d-lg-block">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15"
                            style="color:#3c434a;">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path fill="currentColor"
                                d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7zm-2 0v-7a6 6 0 1 0-12 0v7h12zm-9 4h6v2H9v-2z">
                            </path>
                        </svg>
                    </button>

                    <button data-quantity="0" class="btn-cart me-3 d-none d-lg-block">
                        <a href="cart_2.php" class="btn-cart me-3 d-none d-lg-block">
                            <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="15" width="15"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>icon-cart</title>
                                <path transform="translate(-3.62 -0.85)"
                                    d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0">
                                </path>
                            </svg>
                            <span class="quantity"></span>
                        </a>
                    </button>

                    <a href="" class="nav-link d-block d-lg-none">แจ้งเตือน</a>
                    <a href="cart_2.php" class="nav-link d-block d-lg-none">ตระกล้าสินค้า</a>

                    <!-- หากไม่ได้ login แสดงเหมือนเดิม -->
                    <?php } else { ?>
                    <a class="nav-link me-3" href="Login_User.php">เข้าสู่ระบบ</a>
                    <?php } ?>
                    <a href="product.php?course_type=all"
                        class="btn btn-primary text-white btn-gradient d-flex flex-column justify-content-center mt-3 mt-lg-0"
                        style="background: -webkit-linear-gradient(0deg,  #106eea, #f203ff); border:none;"><span>เริ่มเข้าสู่บทเรียน</span></a>
                </div>
            </div>
        </div>

    </div>
</nav>

<style>
.btn-cart {
    display: flex;
    align-items: start;
    justify-content: start;
    border-radius: 10px;
    border: none;
    background-color: transparent;
    position: relative;
}

.btn-cart::after {
    width: fit-content;
    height: fit-content;
    position: absolute;
    font-size: 15px;
    color: white;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    opacity: 0;
    visibility: hidden;
    transition: .2s linear;
    top: 115%;
}

.icon-cart {
    transition: .2s linear;
}

.icon-cart path {
    fill: rgb(240, 8, 8);
    transition: .2s linear;
}

.btn-cart:hover>.icon-cart {
    transform: scale(1.2);
}

.btn-cart:hover>.icon-cart path {
    fill: rgb(186, 34, 233);
}

.btn-cart:hover::after {
    visibility: visible;
    opacity: 1;
    top: 105%;
}

.quantity {
    display: none;
}

button {
    background: none;
    border: none;
    padding: 15px 15px;
    border-radius: 10px;
    cursor: pointer;
}

button:hover {
    background: rgba(170, 170, 170, 0.062);
    transition: 0.5s;
}

button svg {
    color: #fff;
}
</style>