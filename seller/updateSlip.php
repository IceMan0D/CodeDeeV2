<?php
    include '../conn.php';

    $sale_id = $_GET['sale_id'];
    $valueForUpdateStatus = $_GET['value'];

    $update_status = $conn->prepare('UPDATE sale SET payment_status_id = :value WHERE sale_id = :sale_id');
    $update_status->bindParam(':value', $valueForUpdateStatus);
    $update_status->bindParam(':sale_id', $sale_id);
    $update_status->execute();
    
    header('location:checkSlip.php');
?>