<?php
    include("template/header.php");
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">การเงิน</h1>
                    
                    <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                มีการซื้อขายเสร็จสิ้น</div>
                                                <?php
                                                $countseller = $conn->query("SELECT COUNT(*) AS total FROM sale WHERE payment_status_id = '3'and type_id != '5'");
                                                $row = $countseller->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                                $total = $row['total'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    echo $total." รายการสั่งซื้อ";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-right-left fa-2x text-gray-300"></i>
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                จำนวนผู้ที่มีการซื้อในระบบ</div>
                                                <?php
                                                $countCourse = $conn->query("SELECT COUNT(DISTINCT user_id) AS total FROM sale");
                                                $row = $countCourse->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                                $total = $row['total'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    echo $total." บัญชี";
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                จำนวนเงินที่ผู้ซื้อโอนให้แก่ผู้ขายคอร์ส</div>
                                                <?php
                                                 $sum = $conn->query("SELECT SUM(income) AS total_sum FROM course");
                                                 $row = $sum->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                                 $total_sum = $row['total_sum'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    echo $total_sum." บาท";
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sack-dollar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
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

                    <?php
                        $rsc = $conn->query("select * from course where income IS NOT NULL");
                    ?>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ตารางรายรับของแต่ละคอร์ส</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อคอร์ส</th>
                                            <th>ผู้ขาย</th>
                                            <th>รายได้จาการขายคอร์ส</th>
                                            <th>ส่วนแบ่ง 30 %</th>
                                            <th>เครื่องมือ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>ลำดับที่</th>
                                            <th>ชื่อคอร์ส</th>
                                            <th>ผู้ขาย</th>
                                            <th>รายได้จาการขายคอร์ส</th>
                                            <th>ส่วนแบ่ง 30 %</th>
                                            <th>เครื่องมือ</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    $no = 1;
                                    foreach($rsc as $row){
                                        $course_id = $row ['course_id'];
                                        $course_name = $row ['course_name'];
                                        $rate_id = $row ['rate_id'];
                                        $income = $row ['income'];
                                        $per = $row ['30per'];
                                        $seller_id = $row ['seller_id'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $no;?></th>
                                            <th><?php echo $course_name;?></th>
                                            <?php
                                                $rsu = $conn->query("select * from user where user_id ='$seller_id'");
                                                foreach($rsu as $row){
                                                    $user_username = $row ['user_username'];
                                                }
                                            ?>
                                            <th><?php echo $user_username;?></th>
                                            <th><?php echo $income;?></th>
                                            <th><?php echo $per;?></th>
                                            <th>
                                                <a href="detail_couse.php?id=<?php echo $course_id;?>&uname=<?php echo $user_username;?>" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></a>  
                                                <a href="clean_income.php?id=<?php echo $course_id;?>" class="btn btn-success" onclick="return confirm('คุณแน่ใจที่จะเครียร์ข้อมูลเงินรายได้ที่ผู้ขายต้องจ่ายคุณ!!')"><i class="fa-solid fa-sack-dollar"></i></a>
                                            </th>
                                        </tr>
                                        <?php
                                        $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
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