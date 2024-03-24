<?php require("connect_db.php");

$uid = $_POST['uid'];
    $n_t = $_POST['n_t'];
	$n_d = $_POST['n_d'];

$rs = $conn->query("INSERT INTO notify (notify_topic,notify_detail) 
VALUES ('$n_t','$n_d')");

                    if($rs){
                        ?>
                                <script>
                                    alert("เพิ่มข้อมูลการแจ้งเตือนเรียบร้อย!!");
                                    window.location.href="index.php";
                                </script>
                        <?php
                            }else{
                        ?>
                                <script>
                                    alert("ไม่สามารถเพิ่มข้อมูลการแจ้งเตือนได้!! ลองใหม่อีกครั้ง!!");
                                    window.location.href="index.php";
                                </script>
                        <?php
                            }
                        ?>
                                        