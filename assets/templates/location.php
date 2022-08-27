<?php

    include("/assets/templates/header.php");


    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location WHERE id=$locationLink");	
    $queryPrepared->execute();
    $location = $queryPrepared->fetchAll();

    $locationTitle = $location["location_title"];
    echo $locationTitle;

    $mainTitle = $locationTitle;
    include("/assets/templates/header.php");
    ?>


<?php
    include("/assets/templates/footer.php");
    ?>