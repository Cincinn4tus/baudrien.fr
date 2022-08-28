<?php
session_start();
require "functions.php";


$id = $_GET["id"];


$pdo = connectDB();
$queryPrepared = $pdo->prepare("DELETE FROM baudrien_user WHERE id=$id");
$queryPrepared->execute();



header("Location: ./users.php");