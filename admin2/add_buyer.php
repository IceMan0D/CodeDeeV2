<?php
    include("template/header.php");
?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">เพิ่มบัญชีผู้ซื้อคอร์ส</h1>

<div class="row">



    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ฟอร์มเพิ่มบัญชี</h6>
    </div>
    
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <form action="add_sql_buyer.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="uid" value="<?php echo $user_id;?>">
					<div class="mb-3">
						<label class="form-label">ชื่อเต็มของผู้ใช้</label>
						<input type="text" class="form-control" name="u_full">
					</div>
					<div class="mb-3">
						<label class="form-label">ชื่อบัญชี </label>
						<input type="text" class="form-control" name="u_un" >
					</div>
					<div class="mb-3">
						<label class="form-label">รหัสผ่าน </label>
						<input type="text" class="form-control" name="u_p">
					</div>
					<div class="mb-3">
						<label class="form-label">อีเมล </label>
						<input type="text" class="form-control" name="u_e">
					</div>
					<div class="mb-3">
						<label class="form-label">ที่อยู่ </label>
						<input type="text" class="form-control" name="u_a">
					</div>
                    <div class="mb-3">
						<label class="form-label">เบอร์โทร </label>
						<input type="text" class="form-control" name="u_t">
					</div>
					
					<hr>
                    <center>
					<button type="submit" class="btn btn-dark">สร้าง</button>
                    </center>
				</form>

            </div>
            </div>
            </div>

<?php
    include("template/bottom.php");
?>