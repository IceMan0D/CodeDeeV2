<?php
    include("template/header.php");
    $id = $_GET['id'];
    $uname = $_GET['uname'];
    $rsc = $conn->query("select * from course where course_id  = '$id'");
    foreach($rsc as $row){
		$course_id = $row ['course_id'];
		$course_name = $row['course_name'];
		$course_detail = $row['course_detail'];
		$rate_id = $row['rate_id'];
		$type_id = $row['type_id'];
		$income = $row['income'];
		$per = $row['30per'];
    }
?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">ดูรายละเอียดคอร์ส</h1>

<div class="row">

<div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">แสดงรายละเอียดคอร์ส</h6>
                </div>
<center>
  <div class="shadow p-3 mb-1 bg-white rounded" class="card text-dark bg-light mb-3" style="max-width: 10000px;">
  <div class="card mb-3">
  <div class="card-body">
    <p class="card-text"><strong>ชื่อคอร์ส : <?php echo $course_name;?> </strong></p>
    <p class="card-text"><?php echo $course_detail;?> </p>
    <p class="card-text"><strong>ผู้ขาย : <?php echo $uname;?> </strong></p>
	
    <?php
        $rst = $conn->query("select * from type where type_id  ='$type_id'");
        foreach($rst as $row){
            $type_name = $row ['type_name'];
        }
    ?>
	<p class="card-text"><strong> ประเภทคอร์ส : <?php echo $type_name;?> </strong></p>
    <?php
        $rsr = $conn->query("select * from rate where rate_id ='$rate_id'");
            foreach($rsr as $row){
            $average_score = $row ['average_score'];
            if($average_score<2){
                $color = "danger";
                $text = "แย่";
            }elseif($average_score>=2&&$average_score<3){
                $color = "warning";
                $text = "พอใช้";
            }elseif($average_score>=3&&$average_score<4){
                $color = "primary";
                $text = "ดี";
            }else{
                $color = "success";
                $text = "เยี่ยมมาก";
            }
        }
    ?>
    <p class="card-text"><strong>คะแนน : <?php echo $average_score;?> คะแนน</strong></p>
	<p class="card-text text-<?php echo $color;?>"><strong> <?php echo $text;?> </strong></p>
    <p class="card-text"><strong>ทั้งคอร์สได้รับเงิน : <?php echo $income;?> บาท</strong></p>
    <p class="card-text"><strong>แบ่งเปอร์เซนต์ 30% ได้รับเงิน : <?php echo $per;?> บาท</strong></p>

</div>

   
</div>
<div>
    <a href="finance.php" class="btn btn-dark"><i class="fa-solid fa-arrow-left"></i></a>
    <a href="clean_income.php?id=<?php echo $course_id;?>" class="btn btn-success" onclick="return confirm('คุณแน่ใจที่จะเครียร์ข้อมูลเงินรายได้ที่ผู้ขายต้องจ่ายคุณ!!')"><i class="fa-solid fa-sack-dollar"></i></a>
</div>
</div>
</center>
</div>

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->