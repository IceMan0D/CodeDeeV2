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
                    <h1 class="h3 mb-2 text-gray-800">อัพเดทรูปภาพโปรไฟล์</h1>
                    </div>

                    <div class="row">

                    
                    

                    <?php
                        $rsu = $conn->query("select * from user where status_id = '2' or status_id = '1'");
                    ?>


                    <!-- DataTales Example -->
                    <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">แบบฟอร์ม</h6>
                </div>
                <center>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <form action="update_sql_profile.php" method="post" enctype="multipart/form-data">
					        <input type="hidden" name="uid" value="<?php echo $user_id;?>">
                            <div class="input-group mb-3">
					  <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">รูปภาพโปรไฟล์</button>
					  <input value="<?php echo $img_banking;?>" name="i_1" type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
					</div>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-dark">บันทึก</button>

</from>
                    </div>

        </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->