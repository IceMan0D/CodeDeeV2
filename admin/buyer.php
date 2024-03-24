<?php
    include("template/header.php");
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-2 text-gray-800">จัดการผู้ซื้อคอร์ส</h1>
                    <a href="add_buyer.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> สร้างบัญชีผู้ซื้อคอร์ส</a>
                    </div>

                    <div class="row">

                    
                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                จำนวนบัญชีผู้ซื้อในระบบ</div>
                                                <?php
                                                $result = $conn->query("SELECT COUNT(*) AS totalA FROM user WHERE status_id = '3'");
                                                $row = $result->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                                $totalA = $row['totalA'];
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    echo $totalA." บัญชี";
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
                                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            จำนวนผู้ที่ไม่มีการซื้อในระบบ</div>
                                                <?php
                                                 $total_no = $totalA-$total;
                                                ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    echo $total_no." บัญชี";
                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user-xmark fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
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
                    </div>

                    <?php
                        $rsu = $conn->query("select * from user where status_id = '3'");
                    ?>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ตารางแสดงข้อมูลบัญชีผู้ซื้อ</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อผู้ซื้อคอร์ส</th>
                                            <th>ที่อยู่</th>
                                            <th>อีเมล</th>
                                            <th>เบอร์โทร</th>
                                            <th>จำนวนคอร์ส</th>
                                            <th>เครื่องมือ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>ลำดับที่</th>
                                            <th>ชื่อผู้ซื้อคอร์ส</th>
                                            <th>ที่อยู่</th>
                                            <th>อีเมล</th>
                                            <th>เบอร์โทร</th>
                                            <th>จำนวนคอร์ส</th>
                                            <th>เครื่องมือ</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                    $no = 1;
                                    foreach($rsu as $row){
                                        $user_id = $row ['user_id'];
                                        $user_fullname = $row ['user_fullname'];
                                        $user_email = $row ['user_email'];
                                        $user_address = $row ['user_address'];
                                        $tel = $row ['tel'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $no;?></th>
                                            <th><?php echo $user_fullname;?></th>
                                            <th><?php echo $user_address;?></th>
                                            <th><?php echo $user_email;?></th>
                                            <th><?php echo $tel;?></th>
                                            <?php
                                              $countCourse = $conn->query("SELECT COUNT(DISTINCT user_id) AS total FROM sale WHERE user_id = '$user_id'");
                                              $row = $countCourse->fetch_assoc(); // หรือ fetch_array() ตามความต้องการ
                                              $total = $row['total'];
                                            ?>
                                            <th><p>ซื้อไป <?php echo $total;?> คอร์ส</p></th>
                                            <th>
                                                <a href="datail_buyer.php?id=<?php echo $user_id;?>" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></a>  
                                                <a href="edit_buyer.php?id=<?php echo $user_id;?>" class="btn btn-success" onclick="return confirm('คุณแน่ใจที่จะแก้ไขข้อมูลบัญชีผู้ซื้อ!!')"><i class="fa-solid fa-user-pen"></i></a>
                                                <a href="deluser.php?id=<?php echo $user_id;?>" class="btn btn-danger" onclick="return confirm('คุณแน่ใจที่จะลบข้อมูลหรือไม่? หากลบแล้วจะไม่สามารถกู้คืนมาได้อีก!!')"><i class="fa-solid fa-trash"></i></a>  
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