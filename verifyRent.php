<?php

session_start();
require "functions.php";


$locationId = $_POST["locationId"];

$pdo = connectDB();
$queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location WHERE location_id='$locationId'");	
$queryPrepared->execute();
$location = $queryPrepared->fetch();

$firstday = $_POST["firstday"];
$lastday = $_POST["lastday"];
$errors = [];

if($firstday < $month || empty($firstday)) {
    $errors[] = "La date de départ n'est pas valide \n";
}

if($lastday < $firstday) {
    $errors[] = "Vérifiez la date de retour";
}



if(count($errors) == 0){

	


	$queryPrepared = $pdo->prepare("INSERT INTO baudrien_rent (rent_seller, rent_buyer, rent_date, rent_invoice) 
		VALUES ( :rent_seller , :rent_buyer, :rent_date, :rent_invoice);");


	
	$queryPrepared->execute([
								"rent_seller"=>$email,
                                "rent_buyer"=>$role,
								"rent_date"=>$firstname,
								"rent_invoice"=>$lastname,
							]);

	header("Location: ./rentSummary.php");	

}else{
	header("Location: ./rentLocation.php");
    $_SESSION['errors'] = $errors;
}



