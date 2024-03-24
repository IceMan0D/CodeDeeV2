<?php
	require("connect_db.php");
	$id = $_GET['id'];
	$rs = $conn->query("delete from user where user_id  = '$id '");
	if($rs){
?>
		<script>
			alert("ลบบัญชีเรียบร้อย");
			window.location.href="index.php";
		</script>
<?php
	}else{
?>
		<script>
			alert("ลบบัญชีเกิดข้อผิดผลาด");
			window.location.href="index.php";
		</script>
<?php
	}
?>