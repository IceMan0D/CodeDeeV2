<?php
	require("connect_db.php");
	$id = $_GET['id'];
	$rs = $conn->query("delete from notify where notify_id  = '$id'");
	if($rs){
?>
		<script>
			alert("ลบแจ้งเตือนเรียบร้อย");
			window.location.href="index.php";
		</script>
<?php
	}else{
?>
		<script>
			alert("ลบแจ้งเตือนเกิดข้อผิดผลาด");
			window.location.href="index.php";
		</script>
<?php
	}
?>