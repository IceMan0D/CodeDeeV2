<?php
	require("template/header.php");
	$uid = $_POST['uid'];
	$u_full = $_POST['u_full'];
	$u_un = $_POST['u_un'];
	$u_p = $_POST['u_p'];
	$u_e = $_POST['u_e'];
	$u_a = $_POST['u_a'];
	$u_t = $_POST['u_t'];
	$u_o = $_POST['u_o'];
    $u_od = $_POST['u_od'];
	$u_n = $_POST['u_n'];

	$dir = "../images/bank/";
	$fileimage1 = $dir . basename($_FILES["i_1"]["name"]);

	$name1 =  basename($_FILES["i_1"]["name"]);

$rs = $conn->query("update user set user_username = '$u_un', user_password = '$u_p', user_fullname = '$u_full', user_email = '$u_e',
user_address = '$u_a', tel = '$u_t', img_banking = '$name1', number_banking = '$u_n', status_id = '2', occupation = '$u_o', detail = '$u_od'
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
			window.location.href="seller.php";
		</script>
<?php
	}else{
?>
		<script>
			alert("บันทึกผิดพลาด");
			window.location.href="seller.php";
		</script>
<?php
	}
?>
<?php require("template/bottom.php");?>
