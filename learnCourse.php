<?php
session_start();
include 'conn.php';

if(!isset($_SESSION['user_login'])){
    header('location: index.php');
}else{
    $userID = $_SESSION['user_login'];
    
}

if(!isset($_POST['course_id'])){
    header('location: index.php');
}else{
    $id = $_POST['course_id'];
}

$sql = "SELECT * FROM course WHERE course_id = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
$course = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- bootstarp icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- css -->
    <link rel="stylesheet" href="css/learnCourse.css">
    <link rel="stylesheet" href="css/navbar.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container-fluid p-0">
        <div class="row d-flex flex-column-reverse flex-lg-row">
            <div class="col-12 col-md-8 p-0 my-4 my-lg-0">
                <video height="h-100" controls class="w-100">
                    <source src="<?php echo $course['course_example']?>" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video>

                <div class="div course-desc">
                    <div class="desc row">
                        <h3 class="fw-light">About this course</h3>
                        <h2 class="text-primary"><?php echo $course['course_name'] ?></h2>
                    </div>

                    <div class="desc row">
                        <h4 class="col-4">Course Detail</h2>
                            <p class="col-8"><?php echo $course['course_detail'] ?></p>
                    </div>

                    <div class="desc row">
                        <h4 class="col-4">Requirement</h4>
                        <p class="col-8">
                        <?php 
                        if($course['requirements'] == ""){
                            echo "ไม่ต้องการความต้องการเป็นพิเศษ";
                        }else{
                            echo $course['requirements'];
                        }
                         ?></p>
                    </div>

                    <div class="desc row">
                        <h4 class="col-4">Description</h4>
                        <p class="col-8">
                        <?php 
                        if($course['description'] == ""){
                            echo "คอร์สเนื้อหาการเขียนโปรแกรม ฉบับเข้าใจง่าย สามารถเรียนได้ทุกที่ทุกเวลา";
                        }else{
                            echo $course['description'];
                        }
                         ?>
                        </p>
                        
                    </div>

                    <div class="desc row">
                        <h4 class="col-4">Suitable For</h4>
                        <p class="col-8"><?php 
                        if($course['suitable_for'] == ""){
                            echo "เหมาะสำหรับผู้เริ่มต้นทุกคน";
                        }else{
                            echo $course['suitable_for'];
                        }
                         ?></p>
                    </div>

                    <div class="desc row">
                        <h4 class="col-4">Course Certificate</h4>
                        <a href="" class="btn btn-primary col-8">Donwload Certificate</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5 mt-md-0 col-md-4 p-0 episode-container">

                <a class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle section" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Section 1 : บทนำ
                    </a>
                    <ul class="dropdown-menu episode " style="list-style: none;">
                        <?php 
                        $sql = "SELECT * FROM course_content WHERE course_id = $id AND type_content_id = 1 ORDER BY display_order;";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $episode = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($episode as $i) :
                        ?>
                        <li><a class="dropdown-item py-2" href="product.php?course_type=1"><?php echo $i['course_content_name']?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </a>

                <a class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle section" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Section 2 : ติดตั้งเครื่องมือ
                    </a>
                    <ul class="dropdown-menu episode" style="list-style: none;">
                    <?php 
                        
                        foreach ($episode as $i) :
                        ?>
                        <li><a class="dropdown-item py-2" href="product.php?course_type=1"><?php echo $i['course_content_name']?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </a>

                <a class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle section" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Section 3 : เข้าสู่เนื้อหา
                    </a>
                    <ul class="dropdown-menu episode" style="list-style: none;">
                    <?php 
                        $sql = "SELECT * FROM course_content WHERE course_id = $id AND type_content_id = 3 ORDER BY display_order;";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        $episode = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($episode as $i) :
                        ?>
                        <li><a class="dropdown-item py-2" href="product.php?course_type=1"><?php echo $i['course_content_name']?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </a>

            </div>


        </div>
    </div>



    <?php include 'footer.php' ?>
</body>

</html>