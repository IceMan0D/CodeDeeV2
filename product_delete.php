<?php
	// ob_start();
	// session_start();
    require_once "conn.php";
	
	if(isset($_GET["basket_id"])){

		$stmt_delete_product = $conn->prepare('DELETE FROM basket WHERE basket_id = :basket_id');
		$stmt_delete_product->bindParam(':basket_id', $_GET["basket_id"]);
		$stmt_delete_product->execute();
		header("location:cart_2.php");
		exit;
		// $Line = $_GET["Line"];
		// $_SESSION["strProductID"][$Line] = "";
		// $_SESSION["strQty"][$Line] = "";
	}
?>