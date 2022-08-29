<?php

session_start();
require "functions.php";


$rentPrice = $_SESSION["rent_price"];
$rentSeller =  $_SESSION["seller"];
$rentBuyer = $_SESSION["rent_buyer"];
$rentDate = date('Y-m-d');



	$pdo = connectDB();	


	$queryPrepared = $pdo->prepare("INSERT INTO baudrien_rent (
		rent_seller,
		rent_buyer,
		rent_date,
		rent_price
		) 
		VALUES (
			:rent_seller,
			:rent_buyer,
			:rent_date,
			:rent_price
			);");


	
	$queryPrepared->execute([
								"rent_seller"=>$rentSeller,
                                "rent_buyer"=>$rentBuyer,
								"rent_price"=>$rentPrice,
								"rent_date"=>$rentDate
							]);

						

	header("Location: ./rentValidated.php");
?>