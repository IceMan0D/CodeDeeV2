<?php require("connect_db.php");

$id = $_GET['id'];

$rs = $conn->query("update course set income = '0',30per = '0'
					where course_id  = '$id'");

                    if($rs){
                        ?>
                                <script>
                                    alert("เครียร์ข้อมูลเงินรายได้ที่ผู้ขายต้องจ่ายเรียบร้อย!!");
                                    window.location.href="finance.php";
                                </script>
                        <?php
                            }else{
                        ?>
                                <script>
                                    alert("ไม่สามารถเครียร์ข้อมูลเงินรายได้ที่ผู้ขายต้องจ่ายได้!! ลองใหม่อีกครั้ง!!");
                                    window.location.href="finance.php";
                                </script>
                        <?php
                            }
                        ?>
                                        