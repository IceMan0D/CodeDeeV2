<?php
    include("template/header.php");


    ?>

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">เพิ่มการแจ้งเตือนบนเว็ปไซต์</h1>

<div class="row">



    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 py-2">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ฟอร์มเพิ่มการแจ้งเตือน</h6>
    </div>
    
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <form action="add_sql_noti.php" method="post" enctype="multipart/form-data">
					
					<div class="mb-3">
						<label class="form-label">หัวข้อ</label>
						<input type="text" class="form-control" name="n_t">
					</div>
					<div class="mb-3">
						<label class="form-label">รายละเอียด </label>
						<input type="text" class="form-control" name="n_d" >
					</div>
					<hr>
                    <center>
					<button type="submit" class="btn btn-dark">สร้าง</button>
                    </center>
				</form>

            </div>
            </div>
            </div>
</div>
<?php
    include("template/bottom.php");
?>