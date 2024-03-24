<?php
session_start();
require_once 'conn.php';

$course_type = '';

$sql = 'SELECT * FROM course INNER JOIN type ON course.type_id = type.type_id';

if (isset($_GET['course_type']) && $_GET['course_type'] !== 'all') {
    $course_type = $_GET['course_type'];
    $sql .= ' WHERE course.type_id = :type';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':type', $course_type);
} else {
    $stmt = $conn->prepare($sql);
}
$stmt->execute();
$count = $stmt->rowCount();
$course = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้า</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- bootstarp icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- css -->
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/navbar.css">


    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "navbar.php" ?>

    <h2 class="container mt-5 ">ค้นหาหลักสูตร</h2>

    <div class="filter-container mt-4 mb-5 container">
        <a href="product.php?course_type=1" class="btn border border-1 p-3 <?php if ($_GET['course_type'] == 1) {
                                                                                echo 'active';
                                                                            } ?>">💻 Web Deverloper</a>
        <a href="product.php?course_type=2" class="btn border border-1 p-3 <?php if ($_GET['course_type'] == 2) {
                                                                                echo 'active';
                                                                            } ?>">📱 Mobile Deverloper</a>
        <a href="product.php?course_type=3" class="btn border border-1 p-3 <?php if ($_GET['course_type'] == 3) {
                                                                                echo 'active';
                                                                            } ?>">👾 Game Deverloper</a>
        <a href="product.php?course_type=4" class="btn border border-1 p-3 <?php if ($_GET['course_type'] == 4) {
                                                                                echo 'active';
                                                                            } ?>">💾 UX/UI Design</a>
        <a href="product.php?course_type=5" class="btn border border-1 p-3 <?php if ($_GET['course_type'] == 5) {
                                                                                echo 'active';
                                                                            } ?>">💾 Free Course</a>
        <a href="product.php?course_type=all" class="btn border border-1 p-3 <?php if ($_GET['course_type'] == 'all') {
                                                                                    echo 'active';
                                                                                } ?>">💾 ทั้งหมด</a>
    </div>

    <div class="container">
        <h3>ค้นหารายการ</h3>
        <h5>มีรายการที่ตรงกัน <?php echo $count ?> รายการ</h5>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 ">

                <?php foreach ($course as $i) : ?>

                <div class="col my-3">
                    <div class="card">
                        <div class="tools">
                            <div class="circle">
                                <span class="red box"></span>
                            </div>
                            <div class="circle">
                                <span class="yellow box"></span>
                            </div>
                            <div class="circle">
                                <span class="green box"></span>
                            </div>
                        </div>
                        <div class="card__content ">
                            <a href="course_detail.php?course_id=<?php echo $i['course_id'] ?>"
                                class="position-absolute w-100 h-100 top-0 left-0"></a>
                            <img src="img/course_img/<?php echo $i['course_img'] ?>" alt="" class="w-100"
                                style="height: 180px;">
                            <div class="product-detail p-3">
                                <h4><?php echo $i['course_name'] ?></h4>
                                <p class="course-desc"><?php echo $i['course_detail'] ?></p>
                                <div class="info d-flex justify-content-between">
                                    <p class="price text-danger my-auto"><?php echo $i['course_price'] ?>฿</p>
                                    <form action="order.php" method="post">
                                        <input type="hidden" name="course_id" value="<?= $i['course_id'] ?>">
                                        <button class="CartBtn">
                                            <span class="IconContainer">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 576 512" fill="rgb(17, 17, 17)" class="cart">
                                                    <path
                                                        d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <p class="text my-auto">Add to Cart</p>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    </div>

    <?php include "footer.php" ?>
</body>

</html>