<?php require("connect_db.php");

$uid = $_POST['uid'];
    $u_full = $_POST['u_full'];
	$u_un = $_POST['u_un'];
	$u_p = $_POST['u_p'];
	$u_e = $_POST['u_e'];
	$u_a = $_POST['u_a'];
	$u_t = $_POST['u_t'];

$rs = $conn->query("INSERT INTO user (user_username,user_password,user_fullname,user_email,user_address,tel,status_id,img) 
VALUES ('$u_un','$u_p','$u_full','$u_e','$u_a','$u_t','3','profile-user.png')");

                    if($rs){
                        ?>
                                <script>
                                    alert("เพิ่มข้อมูลบัญชีผู้ซื้อเรียบร้อย!!");
                                    window.location.href="buyer.php";
                                </script>
                        <?php
                            }else{
                        ?>
                                <script>
                                    alert("ไม่สามารถเพิ่มข้อมูลบัญชีผู้ซื้อได้!! ลองใหม่อีกครั้ง!!");
                                    window.location.href="buyer.php";
                                </script>
                        <?php
                            }
                        ?>
                                        