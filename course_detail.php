<?php
session_start();
require_once 'conn.php';
$sql = 'SELECT * FROM course 
        INNER JOIN type ON course.type_id = type.type_id
        INNER JOIN course_content ON course.course_id = course_content.course_id
        INNER JOIN type_course_content ON course_content.type_course_content_id = type_course_content.type_course_content_id
        WHERE type_course_content.type_content_name = "1" OR type_course_content.type_content_name = "2" OR type_course_content.type_content_name = "3"';

$stmt = $conn->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
$course = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container">
    <div class="row g-0 bg-body-secondary position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/WPCCCKjwcQQ" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            <h1>คอร์สเรียน</h1>
            <div class="accordion" id="accordionExample">
                <?php foreach ($course as $course_item): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?= $course_item['course_id'] ?>" aria-expanded="true"
                                    aria-controls="collapse<?= $course_item['course_id'] ?>">
                                <?php
                                if ($course_item['type_content_name'] == "1") {
                                    echo "บทนำ";
                                } elseif ($course_item['type_content_name'] == "2") {
                                    echo "ติดตั้งเครื่องมือพื้นฐาน";
                                } elseif ($course_item['type_content_name'] == "3") {
                                    echo "เนื้อหา";
                                }
                                ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $course_item['course_id'] ?>" class="accordion-collapse collapse show"
                             data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?= $course_item['course_content'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href="#" class="stretched-link">Go somewhere</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
