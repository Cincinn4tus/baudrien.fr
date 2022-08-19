<?php

session_start();
require "functions.php";

    $pdo = connectDB();

    $queryPrepared = $pdo->prepare("DELETE FROM baudrien_location");
    $queryPrepared->execute();


    header("Location: ./catalog.php");


?>