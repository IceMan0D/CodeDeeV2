<?php

$title = 'seller';
require_once('../admin/check_permission.php');
require_once('../conn.php');
include_once('views/head.php'); 
include_once('views/navbar.php');


if(isset($_SESSION['sale_login'])){
    $status = $_SESSION['sale_login'];
    $stmt = $conn->prepare('SELECT * FROM user WHERE user_id = :user_id');
    $stmt->bindParam(':user_id', $status);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<body>
    <?php foreach($row as $user):?>
    <div class="display-1 fw-bold"><?php echo $user['user_fullname'];?> </div>
    <div class="display-1 fw-bold"><?php echo $user['user_email'];?> </div>
    <div class="display-1 fw-bold">PHONE : <?php echo $user['tel'];?> </div>
    <div class="display-1 fw-bold"><?php echo $user['user_address'];?> </div>
    <?php endforeach; ?>
</body>

</html>