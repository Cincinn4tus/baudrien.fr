<?php


$rentPrice = $_SESSION["rent_price"];
$rentSeller =  $_SESSION["seller"];
$rentBuyer = $_SESSION["rent_buyer"];
$rentDate = date('d-m-Y');
$rentInvoice = 



	


	$queryPrepared = $pdo->prepare("INSERT INTO baudrien_rent (rent_seller, rent_buyer, rent_date, rent_invoice) 
		VALUES ( :rent_seller , :rent_buyer, :rent_date, :rent_invoice);");


	
	$queryPrepared->execute([
								"rent_seller"=>$email,
                                "rent_buyer"=>$_SESSION["user_pseudo"],
								"rent_date"=>$firstname,
								"rent_invoice"=>$lastname,
							]);

	header("Location: /rentSummary.php");
?>