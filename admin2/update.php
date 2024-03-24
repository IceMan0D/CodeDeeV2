<?php require("connect_db.php");

$uid = $_POST['uid'];
    $u_full = $_POST['u_full'];
	$u_un = $_POST['u_un'];
	$u_p = $_POST['u_p'];
	$u_e = $_POST['u_e'];
	$u_a = $_POST['u_a'];
	$u_t = $_POST['u_t'];

$rs = $conn->query("update user set user_fullname = '$u_full',user_username = '$u_un',user_username = '$u_p',user_username = '$u_e',user_username = '$u_a',user_username = '$u_t'
					where user_id   = '$uid'");

                    if($rs){
                        ?>
                                <script>
                                    alert("แก้ไขข้อมูลบัญชีผู้ซื้อเรียบร้อย!!");
                                    window.location.href="buyer.php";
                                </script>
                        <?php
                            }else{
                        ?>
                                <script>
                                    alert("ไม่สามารถแก้ไขข้อมูลบัญชีผู้ซื้อได้!! ลองใหม่อีกครั้ง!!");
                                    window.location.href="buyer.php";
                                </script>
                        <?php
                            }
                        ?>
                                        