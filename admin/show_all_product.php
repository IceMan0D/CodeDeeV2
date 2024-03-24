<?php
    require_once 'check_permission.php';
    require_once '../conn.php';

    $course_id = $_GET['id'];
    
    $sql_select_product = 'SELECT * FROM course WHERE course_id = :course_id';
    $stmt = $conn->prepare($sql_select_product);
    $stmt->bindParam(':course_id', $course_id);
    $stmt->execute();
    $all_course = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
    include_once 'views/partials/header.php';
    include_once 'views/partials/navbar.php';
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3><?php echo $all_course['course_name']?></h3>
                <h6><?php echo $all_course['course_detail']?></h6>
                <h6>ผู้จัดทำ : <?php echo $all_course['user_username']?></h6>
            </div>
            <div class="col-md-4">
                <img src="../img/course_img/<?php echo $all_course['course_img']?>" alt="">
            </div>
        </div>
    </div>

</body>

</html>