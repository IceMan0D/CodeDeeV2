<?php
session_start();
require_once 'conn.php';

// เมื่อผู้ใช้เข้าสู่ระบบแล้ว
if (isset($_POST['update'])) {
    $user_id = $_SESSION['user_login'];
    $user_fullname = $_POST['user_fullname'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $tel = $_POST['tel'];
    $occupation = $_POST['occupation'];
    $detail = $_POST['detail'];

    // เตรียมคำสั่ง SQL สำหรับการอัปเดตข้อมูล
    $sql = "UPDATE user 
                SET user_fullname = :user_fullname, 
                    user_email = :user_email, 
                    user_address = :user_address, 
                    tel = :tel, 
                    occupation = :occupation, 
                    detail = :detail 
                WHERE user_id = :user_id";

    // เตรียมและเริ่มการใช้งาน PDO
    $stmt = $conn->prepare($sql);

    // ผูกค่า parameter
    $stmt->bindParam(':user_fullname', $user_fullname, PDO::PARAM_STR);
    $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);
    $stmt->bindParam(':user_address', $user_address, PDO::PARAM_STR);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':occupation', $occupation, PDO::PARAM_STR);
    $stmt->bindParam(':detail', $detail, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    // ประมวลผลคำสั่ง SQL
    $stmt->execute();

    // ส่งกลับไปยังหน้าเดิมหลังจากอัปเดตข้อมูลเรียบร้อย
    header("location: user.php");
    exit; // ออกจากการทำงานทันทีหลังจาก redirect
}

// ดึงข้อมูลของผู้ใช้จากฐานข้อมูลเพื่อให้แสดงในฟอร์ม
$user_id = $_SESSION['user_login'];
$stmt = $conn->prepare("SELECT * FROM user WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit User Information</title>

    <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- bootstarp icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/edituser.css">
</head>

<body>
    <?php include 'navbar.php' ?>

    <div class="container-fluid py-2 bg-light ps-5 mb-5">
        <p class="ps-5 my-auto">User > Edit User Information</p>
    </div>

    <div class="container user-info w-75 Regular shadow p-5 rounded-5" style="max-width: 600px;">
        <div class="row">
            <div class="col-12 img-content">
                <img src="images/mobiledev.png" alt="profile" id="image-profile">
            </div>
            <div class="col-12 info-content mt-5">
                <form method="post" action="">
                    <div class="box">
                        <label for="user_fullname" >Full Name</label>
                        <input type="text" id="user_fullname" name="user_fullname" value="<?php echo $row['user_fullname']; ?>" required><br>
                    </div>

                    <div class="box">
                        <label for="user_email">Email</label>
                        <input type="email" id="user_email" name="user_email" value="<?php echo $row['user_email']; ?>" required><br>
                    </div>

                    <div class="box">
                        <label for="user_address">Address</label>
                        <input type="text" id="user_address" name="user_address" value="<?php echo $row['user_address']; ?>" required><br>
                    </div>

                    <div class="box">
                        <label for="tel">Telephone</label>
                        <input type="tel" id="tel" name="tel" value="<?php echo $row['tel']; ?>" required>
                    </div>

                    <div class="box">
                        <label for="occupation">Occupation</label>
                        <input type="text" id="occupation" name="occupation" value="<?php echo $row['occupation']; ?>">
                    </div>

                    <div class="box">
                        <label for="detail">Detail</label>
                        <textarea id="detail" name="detail"><?php echo $row['detail']; ?></textarea>
                    </div>

                    <div class="btn-container d-flex justify-content-end gap-3 mt-3">
                    <input type="submit" value="cancel" class="btn btn-white shadow-sm">
                    <input type="submit" name="update" value="Save Changes" class="btn btn-primary">
                    </div>
                    
                </form>
            </div>
        </div>

    </div>

    <?php include 'footer.php'?>
</body>

</html>