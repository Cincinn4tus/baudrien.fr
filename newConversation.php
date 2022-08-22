<?php

    session_start();
    require "functions.php";


    $dest = $_SESSION["location_user"];

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM baudrien_user WHERE id='$dest'");	
    $queryPrepared->execute();
    $user = $queryPrepared->fetch();

    $mainTitle = "Nouvelle conversation avec " . $user["pseudo"];

    include("./assets/templates/header.php");
?>

<div class="container">
    

</div>



<?php
    include("./assets/templates/footer.php");
    ?>