<?php
session_start();
require_once "conn.php";

// $sql = "SELECT * FROM course WHERE course_id = :id";
// $result = $conn->prepare($sql);
// $result->bindParam(':id', $id); // Bind the parameter
// $result->execute(); // Execute the query
// $row = $result->fetch(PDO::FETCH_ASSOC);
$subtotal = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cart</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <!-- bootstarp icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- css -->
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <?php include 'navbar.php' ?>

    <section class="mt-4 mb-5">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Your shopping cart</h4>
                            <?php
                            $Total = 0;
                            $sumprice = 0;
                            $m = 1; // m คือ ลำดับที่ 
                            for ($i = 0; $i <= (isset($_SESSION["intLine"]) ? (int)$_SESSION["intLine"] : 0); $i++) {
                                if (isset($_SESSION["strProductID"][$i]) && $_SESSION["strProductID"][$i] != "") {
                                    $sql1 = "SELECT * FROM course WHERE course_id = :product_id";
                                    $result1 = $conn->prepare($sql1);
                                    $result1->bindParam(':product_id', $_SESSION["strProductID"][$i]);
                                    $result1->execute();
                                    $row_pro = $result1->fetch(PDO::FETCH_ASSOC);

                                    $price = $row_pro['course_price'];
                                    $qty = $_SESSION["strQty"][$i];
                                    $subtotal = $qty * $price;
                                    $sumprice += $subtotal;
                            ?>

                                    <div class="row gy-3 mb-4">
                                        <div class="col-xl-6">
                                            <div class="me-lg-5">
                                                <div class="d-flex">
                                                    <img src="https://assets.justinmind.com/wp-content/uploads/2018/11/Lorem-Ipsum-alternatives-768x492.png" class="border rounded me-3" style="width: 96px; height: 96px;" />
                                                    <div class="">
                                                        <a href="#" class="nav-link"><?= $row_pro['course_name'] ?></a>
                                                        <p class="text-muted description"><?= $row_pro['description'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-sm-6 col-6 d-flex flex-row  flex-xl-row text-nowrap">
                                            <div class="">
                                                <p style="width: 100px;" class="me-4 "><span class="border px-2 py-1 rounded-3" ><?= $qty ?></span></p>
                                            </div>
                                            <div class="">
                                                <text class="h6"><?= $price ?>฿</text> <br />
                                                <small class="text-muted text-nowrap"> <?= $subtotal ?>฿ / per item </small>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                            <div class="float-md-end ms-md-auto">
                                                <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i class="bi bi-heart"></i></a>
                                                <a href="product_delete.php?Line=<?= $i ?>" onclick="return confirm('คุณต้องการลบสินค้าในตะกร้าหรือไม่?')" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                                    $m++;
                                }
                            }
                            ?>

                        </div>

                        <div class="border-top pt-4 mx-4 mb-4">
                            <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip
                            </p>
                        </div>
                    </div>
                </div>

                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label class="form-label">Have coupon?</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                                        <button class="btn btn-light border">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow-0 border">
                        <div class="card-body">
                        <form action="print_product.php" id="form1" method="post">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2"><?php echo $sumprice ?>.00฿</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Discount:</p>
                                <p class="mb-2 text-success">0.00฿</p>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2 fw-bold"><?php echo $sumprice ?>.00฿</p>
                            </div>

                            <div class="mt-3">
                                <a href="#" class="btn btn-success w-100 shadow-0 mb-2" onclick="confirmCheckout()" role="button"> Make Purchase </a>
                                <a href="product.php?course_type=all" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- summary -->
            </div>
        </div>
    </section>

    <script>
        function confirmCheckout() {
            if (<?php echo $subtotal ?> == 0) {
                alert("กรุณาเลือกสินค้าก่อนทำการสั่งซื้อ");
            } else {
                // ทำการส่งข้อมูลไปยังหน้าที่ต้องการทำการสั่งซื้อ
                document.getElementById("form1").submit();
            }
        }
    </script>

    <?php include 'footer.php'?>

    

</body>

</html>