<?php

    require_once('../conn.php');
    require_once('../admin/check_permission.php');
    $title = 'ตรวจสลิป';
    include_once('views/head.php');
    include_once('views/navbar.php');

?>

<?php

    
    $user_id = $_SESSION['sale_login'];

    $sql_fullname = $conn->prepare('SELECT course.user_username
                                    FROM course 
                                    INNER JOIN user ON user.user_username = course.user_username
                                    WHERE user.user_id = :user_id');
    $sql_fullname->bindParam(':user_id', $user_id);
    $sql_fullname->execute();
    $row_fullname = $sql_fullname->fetch(PDO::FETCH_ASSOC);
    $username = $row_fullname['user_username'];

    $stmt_course = $conn->prepare('SELECT course.course_name, user.user_fullname, sale.sale_paid, sale.name_img, sale.payment_status_id, sale.sale_id
                                FROM sale
                                INNER JOIN course ON course.course_id = sale.course_id
                                INNER JOIN user ON user.user_id = sale.user_id
                                WHERE course.user_username = :user_id');
                                
    $stmt_course->bindParam(':user_id', $username, PDO::PARAM_STR);
    $stmt_course->execute();
    $courses = $stmt_course->fetchAll(PDO::FETCH_ASSOC);


?>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ลำดับที่</th>
                    <th scope="col">บทเรียน</th>
                    <th scope="col">ผู้ซื้อ</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">ภาพ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($courses as $i => $course): ?>
                <tr>
                    <th scope="row"><?php echo $i+1 ?></th>
                    <td><?php echo $course['course_name']?></td>
                    <td><?php echo $course['user_fullname']; ?></td>
                    <td><?php echo $course['sale_paid']?> </td>
                    <td>
                        <?php 
                            if($course['payment_status_id'] == 2){
                                echo '<p style="color:red;">รอยืนยันจากผู้ขาย</p>';
                            }else { 
                                echo '<p style="color:green;">ชำระเงินเรียบร้อย</p>';
                            }
                        ?>
                    </td>
                    <td><img src="../img/course_img/<?php echo $course['name_img']?>" alt="" width="100px"></td>
                    <td>
                        <a href="updateSlip.php?sale_id=<?php echo $course['sale_id'];?>&value=3"
                            class="btn btn-primary">ยืนยันการชำระเงิน</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>