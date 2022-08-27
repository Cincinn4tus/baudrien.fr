<?php

session_start();
require "functions.php";

$locationId = $_SESSION["locationId"];

$pdo = connectDB();
$queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location WHERE location_id='$locationId'");
$queryPrepared->execute();
$location = $queryPrepared->fetch();


$firstday = $_POST["firstday"];
$lastday = $_POST["lastday"];
$errors = [];

$firstdate = $_POST["firstday"];
$lastdate = $_POST["lastday"];
$verifyFirstday = round(strtotime($firstdate)/60/60);
$verifyLastday = round(strtotime($lastdate)/60/60);
$numberOfDays = ($verifyLastday - $verifyFirstday)/24;
$locationDayPrice = $location["location_price"];
$locationDayPrice = $locationDayPrice / 7;



if(!empty($_POST["wifi"])){
    $wifiPrice = $location["wifi_price"];
}

if(!empty($_POST["menage"])){
    $menagePrice = $location["menage_price"];
}

if(!empty($_POST["food"])){
    $foodPrice = ($location["food_price"]) * $numberOfDays;
}

if(!empty($_POST["material"])){
    $materialPrice = $location["material_price"];
}

if(!empty($_POST["children"])){
    $childrenPrice = $location["children_price"];
}




$servicesPrice = $wifiPrice + $menagePrice + $foodPrice + $materialPrice + $childrenPrice;
$locationPrice = $locationDayPrice * $numberOfDays;
$finalLocationPrice = round(($locationDayPrice * $numberOfDays) + $servicesPrice, 2);


echo str_replace(".", "€", $finalLocationPrice);


if(($verifyFirstday - round(time()/60/60)) < 24) {
    $errors[] = "Merci de réserver au moins 48h avant \n";
}

if($verifyLastday < $verifyFirstday){
    $errors[]= "La date de retour est incorrect";
}

if(count($errors)== 0){
	$_SESSION["location_price"] = $finalLocationPrice;
	$_SESSION["number_of_days"] = $numberOfDays;
	$_SESSION["location_id"] = $locationId;

	if(!empty($_POST["wifi"])){
		$_SESSION["wifi_price"] = $wifiPrice;
	}
	
	if(!empty($_POST["menage"])){
		$_SESSION["menage_price"] = $menagePrice;
	}
	
	if(!empty($_POST["food"])){
		$_SESSION["food_price"] = $foodPrice;
	}
	
	if(!empty($_POST["material"])){
		$_SESSION["material_price"] = $materialPrice;
	}
	
	if(!empty($_POST["children"])){
		$_SESSION["children_price"] = $childrenPrice;
	}

	header ("Location: ./rentSummary.php");
} else {
    $_SESSION["errors"] = $errors;
	header ("Location: ./rentLocation.php");
}

