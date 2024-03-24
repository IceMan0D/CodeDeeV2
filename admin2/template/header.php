<?php require("connect_db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin-CodeD</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <!-- Custom styles for this page -->
     <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
</style>
</head>

<body id="page-top">

<?php 
	session_start();
	if ($_SESSION["user_id"] ==Null) {
		session_destroy();
  ?>

    <script>
      alert('you must login first');
      window.location.href="../login.php";
    </script>

  <?php

  }
?>


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>แดชบอร์ด</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

           

            <!-- Heading -->
            <div class="sidebar-heading">
                การจัดการบัญชีผู้ใช้งาน
            </div>


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="buyer.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>จัดการผู้ซื้อคอร์ส</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="seller.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>จัดการผู้ขายคอร์ส</span></a>
            </li>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                อื่นๆ
            </div>
             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="finance.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>การเงิน</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <?php
                        $rsa = $conn->query("select * from notify");
                                                $countAlert = $conn->query("SELECT COUNT(*) AS total FROM notify");
                                                $row = $countAlert->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                                $total = $row['total'];
                                                ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle"  id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php echo $total;?> </span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    การแจ้งเตือน
                                </h6>
                                <?php
                                foreach($rsa as $row){
                                    $notify_id = $row ['notify_id'];
                                    $notify_topic = $row ['notify_topic'];
                                    $notify_detail = $row['notify_detail'];
                                
                                ?>
                                <a class="dropdown-item d-flex align-items-center" onclick="return confirm('คุณแน่ใจที่จะลบข้อมูลหรือไม่? หากลบแล้วจะไม่สามารถกู้คืนมาได้อีก!!')" href="del_noti.php?id=<?php echo $notify_id;?>">
                                    <div>
                                        <span class="font-weight-bold"><?php echo $notify_topic;?> </span>
                                        <div class="small text-gray-500"><?php echo $notify_detail;?>
                                    </div>
                                        
                                    </div>
                                    
                                </a>
                                <?php
                                }
                                ?>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <?php
                            $user_id  =$_SESSION["user_id"];
                            $rsud = $conn->query("select * from user where user_id = '$user_id'");
                            foreach($rsud as $row){
                                $img = $row ['img'];
                            }
                        ?>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["status_name"];?> : <?php echo $_SESSION["user_fullname"];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/profile/<?php echo $img;?> ">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->