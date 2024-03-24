<?php
// ob_start();
session_start();
require_once "conn.php";

// ตรวจสอบว่ามีการส่ง course_id มาหรือไม่
// if (!isset($_SESSION["intLine"])) {
//   // เริ่มต้นค่าเริ่มต้น
//   $_SESSION["intLine"] = 0;
//   $_SESSION["strProductID"] = array(); // เก็บรหัสสินค้า
//   $_SESSION["strQty"] = array(); // เก็บจำนวนสินค้า
// }


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $user = $_SESSION['user_login'];
  $course_id = $_POST['course_id'];  

  echo $user." ".$course_id;
    // ค้นหาว่าสินค้าอยู่ในตะกร้าแล้วหรือไม่
    $check_have_course = $conn->prepare('SELECT user_id, course_id FROM basket WHERE user_id = :user_id AND course_id = :course_id');
    $check_have_course->bindParam(':user_id', $user);
    $check_have_course->bindParam(':course_id', $course_id);
    $check_have_course->execute();
    // $test = $check_have_course->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($test);
    // exit;
    $check_value  = $check_have_course->rowCount();
  
    if($check_value > 0){
      echo 
      "<script>
        alert('สินค้านี้อยู่ในตะกร้าแล้ว!')
        window.location.href = 'product.php?course_type=all'
      </script>";
    }else{
      $stmtInsertToBasket = 'INSERT INTO basket (user_id,course_id) VALUES (:user_id, :course_id)';
      $stmt = $conn->prepare($stmtInsertToBasket);
      $stmt->bindParam(':user_id', $user);
      $stmt->bindParam(':course_id', $course_id);
      $stmt->execute();
      header("location: cart_2.php");
    }
  
  // เมื่อเลือกคอสแล้วให้นำข้อมูล user_id course_id มาใส่ตะกร้า

}

// ตรวจสอบว่ามีการส่ง course_id มาหรือไม่
// if (isset($_POST["course_id"]) && !empty($_POST["course_id"])) {

//   // ค้นหาว่าสินค้าอยู่ในตะกร้าแล้วหรือไม่
//   $check_have_course = $conn->prepare('SELECT user_id, course_id FROM basket WHERE course_id = :user_id AND course_id = :course_id');
//   $check_have_course->bindParam(':user_id', $user);
//   $check_have_course->bindParam(':course_id', $course_id);
//   $check_have_course->execute();

//   if($check_have_course->rowCount() > 0 ){
//     echo 
//     "<script>
//       alert('สินค้านี้อยู่ในตะกร้าแล้ว!')
//       window.location.href = 'product.php?course_type=all'
//     </script>";
//   }else{
//     header("location: cart_2.php");
//   }
// }
  
//   $key = array_search($course_id, $_SESSION["strProductID"]);


//   // สินค้าอยู่ในตะกร้า แสดงข้อความแจ้งเตือน
//   if ($key !== false) {
//     // echo "<script>alert('สินค้าอยู่ในตะกร้าแล้ว');</script>";
//     // header("location: productCatalogPagination.php");
//     echo 
//     "<script>
//       alert('สินค้านี้อยู่ในตะกร้าแล้ว!')
//       window.location.href = 'product.php?course_type=all'
//     </script>";
//   } else {
//     // สินค้าไม่อยู่ในตะกร้า เพิ่มสินค้าใหม่
//     // $intnewLine = $_SESSION["intLine"];
//     // $_SESSION["intLine"]++;
//     // $_SESSION["strProductID"][$intnewLine] = $course_id;
//     // $_SESSION["strQty"][$intnewLine] = 1;
//     header("location: cart_2.php");
//   }
// } else {
//   // แสดงข้อผิดพลาด
//   echo "Error: Course ID is missing.";
// }


?>