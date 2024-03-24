<?php
    session_start();

    // if(!empty($_SESSION['sale_login'])){
    //     exit;
    // }else if(empty($_SESSION['sale_login']) && empty($_SESSION['admin_login'])){
       
    // }
    if(!empty($_SESSION['sale_login']) && !empty($_SESSION['admin_login'])){
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