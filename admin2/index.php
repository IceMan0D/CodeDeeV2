<?php
    include("template/header.php");
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="add_noti.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> สร้างการแจ้งเตือน</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                จำนวนผู้ซื้อในระบบ</div>
                                                <?php
                                                $result = $conn->query("SELECT COUNT(*) AS total FROM user WHERE status_id = '3'");
                                                $row = $result->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                                $total = $row['total'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    echo $total." บัญชี";
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa-solid fa-circle-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            จำนวนผู้ขายในระบบ</div>
                                            <?php
                                                $countseller = $conn->query("SELECT COUNT(*) AS total FROM user WHERE status_id = '2' or status_id='1'");
                                                $row = $countseller->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                                $total = $row['total'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    echo $total." บัญชี";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                มีการคอร์สทั้งสิ้น</div>
                                                <?php
                                                $countCourse = $conn->query("SELECT COUNT(*) AS total FROM course");
                                                $row = $countCourse->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                                $total = $row['total'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    echo $total." คอร์ส";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">รายได้จากส่วนแบ่งการซื้อขายคอร์ส(30%)
                                            </div>
                                            <?php
                                                $sum = $conn->query("SELECT SUM(income) AS total_sum FROM course");
                                                $row = $sum->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                                $total_sum = $row['total_sum'];
                                                $divide_sum = $total_sum*30/100;
                                                ?>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                    echo $divide_sum." บาท";
                                                ?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-percent fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                               <!-- Project Card Example -->
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">สัดส่วนประเภทคอร์สในระบบ</h6>
                                </div>
                                <?php
                                    $countCourse = $conn->query("SELECT COUNT(*) AS totalCourse FROM course");
                                    $row = $countCourse->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                    $totalCourse = $row['totalCourse'];
                                    ?>
                                <!-- Card Body -->
                                <div class="card-body ">
                                    <div class="chart-pie pb-2">
                                        <div>
                                        <canvas id="myChart"></canvas>
                                        </div>

                                        <?php
                                            $countFull = $conn->query("SELECT COUNT(*) AS totalFull FROM course WHERE type_id = '1'");
                                            $row = $countFull->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalFull = $row['totalFull'];
                                            
                                            $countBack = $conn->query("SELECT COUNT(*) AS totalBack FROM course WHERE type_id = '2'");
                                            $row = $countBack->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalBack = $row['totalBack'];

                                            $countFront = $conn->query("SELECT COUNT(*) AS totalFront FROM course WHERE type_id = '3'");
                                            $row = $countFront->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalFront = $row['totalFront'];

                                            $countUx = $conn->query("SELECT COUNT(*) AS totalUx FROM course WHERE type_id = '4'");
                                            $row = $countUx->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalUx = $row['totalUx'];

                                            $countFree = $conn->query("SELECT COUNT(*) AS totalFree FROM course WHERE type_id = '5'");
                                            $row = $countFree->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                            $totalFree = $row['totalFree'];
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
                                                data: [<?php echo $totalFull; ?>, <?php echo $totalBack; ?>, <?php echo $totalFront; ?>,<?php echo $totalUx; ?>,<?php echo $totalFree; ?>],
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
                                    <br>
                                </div>
                                
                            </div>
                        </div>
                        
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow  mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">คุณภาพคอร์สจำแนกตามแต่ละประเภท</h6>
                                </div>
                                <div class="card-body">
                                <?php
                                    	$rsl = $conn->query("select * from type");
                                        foreach($rsl as $row){
                                            $type_id = $row ['type_id'];
                                            $type_name = $row ['type_name'];

                                            $rs = $conn->query("SELECT type_id, AVG(rate) AS average_rate FROM sale WHERE type_id = '$type_id'");
                                    if ($rs->num_rows > 0) {
                                        // เริ่มต้นสร้างแถบกราฟ
                                        ?>
                                    <h4 class="small font-weight-bold"><?php echo $type_name;?> <span
                                            
                                        <?php
                                    
                                        // วนลูปผลลัพธ์ที่ได้จากฐานข้อมูล
                                        while ($row = $rs->fetch_assoc()) {
                                            $type_id = $row['type_id'];
                                            $average_rate = $row['average_rate'];
                                            if($average_rate<2){
                                                $color = "danger";
                                           
                                            }elseif($average_rate>=2&&$average_rate<3){
                                                $color = "warning";
                                            
                                            }elseif($average_rate>=3&&$average_rate<4){
                                                $color = "primary";
                                           
                                            }else{
                                                $color = "success";
                                            }
                                    
                                        }
                                        ?>
                                        class="float-right text-<?php echo $color;?>">
                                        <?php echo $average_rate." ";?>คะแนน
                                        </span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-<?php echo $color;?>" role="progressbar" style="width:  <?php echo $average_rate*20;?>%"
                                            aria-valuenow="<?php echo $average_rate;?>" aria-valuemin="0" aria-valuemax="5"></div>
                                    </div>
                                    <?php 
                                    } else {
                                        echo "ไม่พบข้อมูล";
                                    }
                                }
                                    ?> 
                                </div>
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