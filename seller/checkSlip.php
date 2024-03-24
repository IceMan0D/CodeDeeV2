<?php

    require_once('../conn.php');
    require_once('../admin/check_permission.php');
    include_once('views/head.php');
    include_once('views/navbar.php');

?>

<?php
    
    // $sql = 'SELECT user.user_username, course.course_id, sale_paid, name_img 
    //         FROM sale 
    //         INNER JOIN course 
    //         ON sale.user_id = course.user_username'
    
    $user_id = $_SESSION['sale_login'];
    // $stmt_course = $conn->prepare('SELECT course.*, user.user_username,
    //                            FROM course 
    //                            INNER JOIN user ON course.user_username = user.user_username
    //                            WHERE user.user_id = :user_id');
    
    // แสดงคอสที่ตัวเองขาย 
    $stmt_course = $conn->prepare('SELECT *
                                FROM sale
                                INNER JOIN course 
                                ON course.course_id = sale.course_id');
    // $stmt_course->bindParam(':user_id', $user_id);
    $stmt_course->execute();
    $courses = $stmt_course->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    var_dump($courses);
    echo '</pre>';
?>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ลำดับที</th>
                    <th scope="col">บทเรียน</th>
                    <th scope="col">ผู้ซื้อ</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">ภาพ</th>
                    <th scope="col">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($courses as $i => $course):?>
                <tr>
                    <th scope="row"><?php echo $i+1 ?></th>
                    <td><?php echo $course['course_name']?></td>
                    <td><?php echo 'test'; ?></td>
                    <td><?php echo $course['course_price']?> </td>
                    <td><?php echo $course['course_price']?> </td>
                    <td>
                        <form>
                            <input type="hidden" value="3" name="payment_status">
                            <input type="submit" value="ยืนยันการชำระเงิน" name="submit">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?> <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>