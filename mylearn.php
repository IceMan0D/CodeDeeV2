<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['user_login'])) {
    header('location: index.php');
} else {
    $userID = $_SESSION['user_login'];
    $sql = "SELECT * FROM sale WHERE user_id = {$userID}";
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
    <title>myLearn</title>


    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- bootstarp icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- css -->
    <link rel="stylesheet" href="css/myLearn.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container-fluid p-0 position-relative" style="height: 450px; ">
        <h1 class="position-absolute text-white text-center w-100" style="margin-top: 200px;">MY <span
                class="text-warning">LEARNING</span></h1>
        <div class="w-100 h-100 position-absolute"
            style="background-image:url(https://images.unsplash.com/photo-1542831371-32f555c86880?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D); background-size:cover; z-index:-1; filter:grayscale(60%);">
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <h2 class="text-center mt-5 mb-3 fw-light">LEARNING SPACE FOCUS ON YOUR DREAM</h2>
            <hr class="w-75 mx-auto">
            <p class="text-center">Get starting your course</p>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 d-flex justify-content-center mt-5">

                <?php foreach ($course as $i) :
                    $id = $i['course_id'];
                    $sql = "SELECT * FROM course WHERE course_id =  $id ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(); ?>

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
                        <div class="card__content">
                            <img src="images/mobiledev.png" alt="" class="w-100" style="height: 180px;">
                            <div class="product-detail p-3">
                                <h4 style="min-height: 70px;" class="text-center fw-light">
                                    <?php echo $result['course_name'] ?></h4>
                                <p class="course-desc" style="height: 100px; overflow: hidden;">
                                    <?php echo $result['course_detail'] ?></p>
                                <div class="info d-flex justify-content-end">
                                    <form action="learnCourse.php" method="post">
                                        <input type="hidden" name="course_id" value="<?= $result['course_id'] ?>">
                                        <input type="submit" class="btn btn-warning mt-3" value="Go to Learn"></a>
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

    <?php include 'footer.php' ?>
</body>

</html>