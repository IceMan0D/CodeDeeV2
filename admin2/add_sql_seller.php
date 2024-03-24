<?php require("connect_db.php");
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

$rs = $conn->query("INSERT INTO user (user_username,user_password,user_fullname,user_email,user_address,tel,status_id,profile,occupation,detail,number_banking,img_banking) 
VALUES ('$u_un','$u_p','$u_full','$u_e','$u_a','$u_t','2','profile-user.png','u_o','u_od','u_n','$name1')");

if(move_uploaded_file($_FILES["i_1"]["tmp_name"],$fileimage1)){
	echo "ไพล์ภาพชื่อ". basename($_FILES["i_1"]["name"]). "อัพโหลดเเล้ว";
}else{
	echo "เกิดข้อผิดพลาดกรุณาเลิกรูปภาพ";
}


                    if($rs){
                        ?>
                                <script>
                                    alert("เพิ่มข้อมูลบัญชีผู้ขายเรียบร้อย!!");
                                    window.location.href="seller.php";
                                </script>
                        <?php
                            }else{
                        ?>
                                <script>
                                    alert("ไม่สามารถเพิ่มข้อมูลบัญชีผู้ขายได้!! ลองใหม่อีกครั้ง!!");
                                    window.location.href="seller.php";
                                </script>
                        <?php
                            }
                        ?>
                                        