<?php
    include("template/header.php");
    $rsu = $conn->query("select * from user where user_id  = '$user_id'");
    foreach($rsu as $row){
		$profile = $row ['profile'];
		$user_username = $row['user_username'];
		$user_password = $row['user_password'];
		$user_fullname = $row['user_fullname'];
		$emali = $row['user_email'];
		$address = $row['user_address'];
		$tel = $row['tel'];
        $number_banking = $row['number_banking'];
        $occupation = $row['occupation'];
        
    }
    
?>

<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 text-gray-800">ข้อมูลบัญชี</h1>
                    <a href="update_profile.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> อัพโหลดรูปภาพ</a>
                    </div>

                    <div class="row">

                    
                    

                    <?php
                        $rsu = $conn->query("select * from user where status_id = '2' or status_id = '1'");
                    ?>


                    <!-- DataTales Example -->
                    <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ตารางแสดงรายละเอียดบัญชี</h6>
                </div>
                <center>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <img src="../images/profile/<?php echo $profile;?>" width="15%" alt="">
                                <div class="text font-weight-bold text-info mb-1">ชื่อเต็มของผู้ใช้ :
                                    <?php echo $user_fullname;?>
                                </div>

                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-gray-800">ชื่อบัญชี :
                                            <?php echo $user_username;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-gray-800">รหัสผ่าน :
                                            <?php echo $user_password;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-gray-800">อีเมล :
                                            <?php echo $emali;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-gray-800">ที่อยู่ :
                                            <?php echo $address;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-gray-800">เบอร์โทร :
                                            <?php echo $tel;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-gray-800">หมายเลขบัญชีธนาคาร :
                                            <?php echo $number_banking;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text font-weight-bold text-gray-800">อาชีพ :
                                            <?php echo $occupation;?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                           
                        </div>
                    </div>
                    
            <div class="col-auto">
                <a href="buyer.php" class="btn btn-dark"><i class="fa-solid fa-arrow-left"></i></a>
                
            </div>

        </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->