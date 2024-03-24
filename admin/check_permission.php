<?php
    session_start();

<<<<<<< HEAD
    if(empty($_SESSION['sale_login'])){
        header('location: ../saller/sale.php');
        exit;
    }else if(empty($_SESSION['sale_login']) && empty($_SESSION['admin_login'])){
=======
    // if(!empty($_SESSION['sale_login'])){
    //     exit;
    // }else if(empty($_SESSION['sale_login']) && empty($_SESSION['admin_login'])){
       
    // }
    if(!empty($_SESSION['sale_login']) && !empty($_SESSION['admin_login'])){
>>>>>>> a6f2c3f995bf510e8f7c2abe045d6fb9607815db
        echo '<script>alert("ท่านไม่มีสิทธิเข้าถึงหน้านี้.");</script>';
        echo 
        '<script>
        setTimeout(() => {
        },1000)
        window.location.href = "../CodeDee/index.php";
        </script>';
        exit;
    }
    
?>