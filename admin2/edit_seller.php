<?php
    include("template/header.php");
    $id = $_GET['id'];
	$rsu = $conn->query("select * from user where user_id = '$id'");
    foreach($rsu as $row){
		$user_id = $row ['user_id'];
		$user_username = $row['user_username'];
		$user_password = $row['user_password'];
		$user_fullname = $row['user_fullname'];
		$status_id = $row['status_id'];
		$emali = $row['user_email'];
		$address = $row['user_address'];
		$tel = $row['tel'];
        $img_banking = $row['img_banking'];
        $number_banking = $row['number_banking'];
        $occupation = $row['occupation'];
        $detail = $row['detail'];
    }

?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">แก้ไขบัญชีผู้ซื้อ</h1>

<div class="row">



    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ฟอร์มแก้ไขบัญชี</h6>
    </div>
    
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <form action="update_sell.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="uid" value="<?php echo $user_id;?>">
                    
					<div class="mb-3">
						<label class="form-label">ชื่อเต็มของผู้ใช้</label>
						<input type="text" class="form-control" name="u_full" value="<?php echo $user_fullname;?>">
					</div>
					<div class="mb-3">
						<label class="form-label">ชื่อบัญชี </label>
						<input type="text" class="form-control" name="u_un" value="<?php echo $user_username;?>">
					</div>
					<div class="mb-3">
						<label class="form-label">รหัสผ่าน </label>
						<input type="text" class="form-control" name="u_p" value="<?php echo $user_password;?>">
					</div>
					<div class="mb-3">
						<label class="form-label">อีเมล </label>
						<input type="text" class="form-control" name="u_e" value="<?php echo $emali;?>">
					</div>
					<div class="mb-3">
						<label class="form-label">ที่อยู่ </label>
						<input type="text" class="form-control" name="u_a" value="<?php echo $address;?>">
					</div>
                    <div class="mb-3">
						<label class="form-label">เบอร์โทร </label>
						<input type="text" class="form-control" name="u_t" value="<?php echo $tel;?>">
					</div>
                    <div class="mb-3">
						<label class="form-label">อาชีพ </label>
						<input type="text" class="form-control" name="u_o" value="<?php echo $occupation;?>">
					</div>
                    <div class="mb-3">
						<label class="form-label">รายละเอียดอาชีพ </label>
						<input type="text" class="form-control" name="u_od" value="<?php echo $detail;?>">
					</div>
                    <font color="#dc3545"> * หมายเหตุ : <b>กรุณาใช้ธนาคารกรุงไทย</b> *</font><br>
					<div class="input-group mb-3">
					  <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Qr-Code บัญชีธนาคาร</button>
					  <input value="<?php echo $img_banking;?>" name="i_1" type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
					</div>
                    <div class="mb-3">
						<label class="form-label">หมายเลขบัญชีธนาคาร </label>
						<input type="text" class="form-control" name="u_n" value="<?php echo $number_banking;?>">
					</div>
					<hr>
                    <center>
					<button type="submit" class="btn btn-dark">บันทึก</button>
                    </center>
				</form>

            </div>
            </div>
            </div>

<?php
    include("template/bottom.php");
?>