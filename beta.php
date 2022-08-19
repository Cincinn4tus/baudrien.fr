<?php

    session_start();
    require "functions.php";

    $link = ".".$_SERVER['PHP_SELF'];


    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location WHERE location_link='$link'");	
    $queryPrepared->execute();
    $location = $queryPrepared->fetch();


    $title = $location["location_title"];
    $description = $location["location_description"];
    $price = $location["location_price"];
    $wifi = $location["location_service_wifi"];
    $material = $location["location_service_material"];
    $children = $location["location_service_children"];
    $menage = $location["location_service_menage"];
    $food = $location["location_service_food"];


    $mainTitle = $location["location_title"];

    include("./assets/templates/header.php")
    ?>




        <div id="location-page" class="container">
            <div class="row">
                <h1 id="location-main-title"> <?php echo $location['location_title']; ?></h1><br>
                <img id="location-main-img" src="<?php echo $location["location_image"];?>">
            </div>


            <div id="location-description">
                <p>
                    <h3>Description</h3><br>
                    <?php echo $location["location_description"];?>
                </p>
            </div>


            <div id="location-services">
                    <?php
                if($wifi == 1){
                    ?>
                    <div class="location-service-box">
                        <p>
                            <i class="icon bi bi-wifi"></i><br> Connexion internet
                        </p>
                    </div>
                    <?php
                    } 

                if($material == 1){
                    ?>
                    <div class="location-service-box">
                        <p>
                            <i class="icon bi bi-box"></i><br> Matériel mis à disposition
                        </p>
                    </div>
                <?php }

                if($menage == 1) {
                    ?>
                    <div class="location-service-box">
                            <i class="icon bi bi-box"></i>
                    </div>
                    <h4>
                    Ménage en fin de séjour
                    </h4>
                <?php }


                if($children == 1) {
                ?>
                    <div class="location-service-box">
                        <p>
                            <i class="icon bi bi-box"></i><br> Espace aménagé pour enfants
                        </p>
                    </div>
                <?php }

                if($food == 1) {
                ?>
                <div class="location-service-box">
                    <p>
                        <i class="icon bi bi-box"></i><br> Pension alimentaire
                    </p>
                </div>
                <?php }
                ?>
            </div>









    </div>










<?php
    include("./assets/templates/footer.php");
    ?>
