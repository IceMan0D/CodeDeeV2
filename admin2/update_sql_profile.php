<?php require("connect_db.php");
$uid = $_POST['uid'];

$dir = "../images/profile/";
	$fileimage1 = $dir . basename($_FILES["i_1"]["name"]);

	$name1 =  basename($_FILES["i_1"]["name"]);

    $rs = $conn->query("update user set profile = '$name1'
					where user_id = '$uid'");
					
	if(move_uploaded_file($_FILES["i_1"]["tmp_name"],$fileimage1)){
	echo "ไพล์ภาพชื่อ". basename($_FILES["i_1"]["name"]). "อัพโหลดเเล้ว";
}else{
	echo "เกิดข้อผิดพลาดกรุณาเลิกรูปภาพ";
}
	if($rs){
?>
		<script>
			alert("บันทึกเรียบร้อย");
			window.location.href="profile.php";
		</script>
<?php
	}else{
?>
		<script>
			alert("บันทึกผิดพลาด");
			window.location.href="profile.php";
		</script>
<?php
	}
?>
<?php require("template/bottom.php");?>
