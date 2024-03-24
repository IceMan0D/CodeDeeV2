<?php
    include("template/header.php");
    $id = $_GET['id'];
	$rsu = $conn->query("select * from user where user_id = '$id'");
    $rss = $conn->query("select * from sale where user_id = '$id' and payment_status_id = '3'");
    foreach($rsu as $row){
		$user_id = $row ['user_id'];
		$user_username = $row['user_username'];
		$user_password = $row['user_password'];
		$user_fullname = $row['user_fullname'];
		$status_id = $row['status_id'];
		$emali = $row['user_email'];
		$address = $row['user_address'];
		$tel = $row['tel'];
    }

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">รายละเอียดผู้ซื้อสินค้า</h1>
                    
                    <div class="row">

                    

                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100 py-2">
                            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ตารางแสดงรายละเอียดผู้ซื้อ</h6>
                        </div>
                        <center>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
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

                                        </div>
                                        <div class="col-auto">
                                        <a href="edit_buyer.php?id=<?php echo $user_id;?>" class="btn btn-success" onclick="return confirm('คุณแน่ใจที่จะแก้ไขข้อมูลบัญชีผู้ซื้อ!!')"><i class="fa-solid fa-user-pen"></i></a>
                                        </div>
                                        </div>
                                    </div>
                                        <?php
                                                    if($rss->num_rows > 0){
                                        ?>	
                                            <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">ลำดับที่</th>
                                            <th scope="col">ชื่อคอร์ส</th>
                                            <th scope="col">ประเภทคอร์ส</th>
                                            <th scope="col">สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                        <?php
                                                    $no=1;
                                                    foreach($rss as $row){
                                                                    $course_id = $row ['course_id'];
                                                                    $finished_studying = $row ['finished_studying'];

                                                                    if($finished_studying==1){
                                                                        $text="เรียนเสร็จเรียบร้อย";
                                                                        $icon="<i class='fa-solid fa-circle-check' style='color:green;'></i>" ;
                                                                    }else{
                                                                        $text="เรียนยังไม่เสร็จ";
                                                                        $icon="<i class='fa-solid fa-circle-xmark' style='color:red;'></i>" ;
                                                                    }
                                                                    $rsc = $conn->query("select * from course where course_id ='$course_id'");
                                                                    foreach($rsc as $row){
                                                                        $course_name = $row ['course_name'];
                                                                        $type_id = $row ['type_id'];
                                                                        $rstc = $conn->query("select * from type where type_id = '$type_id'");
                                                                        foreach($rstc as $row){
                                                                            $type_name = $row ['type_name'];
                                                                        }
                                                                    }
                                                                    
                                                    
                                        ?>			
                                            <tr>
                                            <th scope="row"><?php echo $no;?></th>
                                            <td><?php echo $course_name;?></td>
                                            <td><?php echo $type_name;?></td>
                                            <td><?php echo $icon;?> <?php echo $text;?></td>
                                            </tr>
                                        <?php
                                                    
                                                    $no++;
                                                    }
                                                
                                                    
                                        ?>
                                        </tbody>
                                        </table>
                                        <?php
                                        $countCourse = $conn->query("SELECT COUNT(*) AS totalCourse FROM sale");
                                        $row = $countCourse->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                        $totalCourse = $row['totalCourse'];
                                        ?>
                                            <div class="h5 font-weight-bold text-info mb-1">แบ่งตามประเภท
                                            </div>
                                            
                                        <div class="chart-pie pb-2">
                                        <div>
                                        <canvas id="myChart"></canvas>
                                        </div>

                                        <?php
                                            $countFull = $conn->query("SELECT COUNT(*) AS totalFull FROM sale WHERE type_id = '1' and user_id = '$user_id'");
                                            $row = $countFull->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalFull = $row['totalFull'];
                                            
                                            $countBack = $conn->query("SELECT COUNT(*) AS totalBack FROM sale WHERE type_id = '2'and user_id = '$user_id'");
                                            $row = $countBack->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalBack = $row['totalBack'];

                                            $countFront = $conn->query("SELECT COUNT(*) AS totalFront FROM sale WHERE type_id = '3'and user_id = '$user_id'");
                                            $row = $countFront->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalFront = $row['totalFront'];

                                            $countUx = $conn->query("SELECT COUNT(*) AS totalUx FROM sale WHERE type_id = '4'and user_id = '$user_id'");
                                            $row = $countUx->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalUx = $row['totalUx'];

                                            $countUx = $conn->query("SELECT COUNT(*) AS totalFr FROM sale WHERE type_id = '5'and user_id = '$user_id'");
                                            $row = $countUx->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalFr = $row['totalFr'];

                                            
                                            ?>
                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                        <script>
                                        const ctx = document.getElementById('myChart');

                                        new Chart(ctx, {
                                            type: 'doughnut',
                                            data: {
                                            labels: ['Full Stack Developer', 'Back End Developer', 'Front-End Developer', 'UX/UI Design', 'Free Course'],
                                            datasets: [{
                                                label: 'มีจำนวนคอร์ส',
                                                data: [<?php echo $totalFull; ?>, <?php echo $totalBack; ?>, <?php echo $totalFront; ?>,<?php echo $totalUx; ?>,<?php echo $totalFr; ?>],
                                                backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(213, 245, 35 )',
                                            'rgb(22, 149, 204 )',
                                            'rgb(216, 52, 199 )',
                                            'rgb(52, 216, 99 )'
                                            ],
                                            hoverOffset: 4
                                            }]
                                            },
                                            options: {
                                                    responsive: true, // ทำให้ Pie Chart ปรับขนาดตามพื้นที่ของ div container
                                                    maintainAspectRatio: false // ทำให้ Pie Chart ปรับขนาดอิสระโดยไม่คำนึงถึงอัตราส่วน
                                                }
                                        });
                                        </script>
                                    </div>
                                    <div class="col-auto">
                                        <a href="buyer.php" class="btn btn-dark"><i class="fa-solid fa-arrow-left"></i></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="deluser.php?id=<?php echo $user_id;?>" class="btn btn-danger" onclick="return confirm('คุณแน่ใจที่จะลบข้อมูลหรือไม่? หากลบแล้วจะไม่สามารถกู้คืนมาได้อีก!!')"><i class="fa-solid fa-trash"></i></a>  
                                        </div>
                                    
                                        </div>
                                        
                                        <?php			  
                                                    }else{		
                                        ?>			
                                                    <center><h1><br><i class="fa-solid fa-circle-xmark" style="color:red;"></i> !!ไม่มีรายชื่อคอร์สที่จ่ายเงินเรียบร้อย!! <i class="fa-solid fa-circle-xmark" style="color:red;"></i></h1><h4>รายชื่อจะดูได้ก็ต่อเมื่อลูกค้าจ่ายเงินและสถานะได้รับการอัปเดตในระบบเรียบร้อยแล้ว !! เท่านั้น !!</h4></center>
                                                    <div class="col-auto">
                                        <a href="buyer.php" class="btn btn-dark"><i class="fa-solid fa-arrow-left"></i></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="deluser.php?id=<?php echo $user_id;?>" class="btn btn-danger" onclick="return confirm('คุณแน่ใจที่จะลบข้อมูลหรือไม่? หากลบแล้วจะไม่สามารถกู้คืนมาได้อีก!!')"><i class="fa-solid fa-trash"></i></a>  
                                        </div>
                                        <?php
                                                    }
                                        ?>
                                        </div>
                                        </div>            
                                        </center>
                                </center>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

<?php
    include("template/bottom.php");
?>