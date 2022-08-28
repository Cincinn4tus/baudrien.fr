<?php 
	session_start();
	require "functions.php";
    $mainTitle = "Destinations";
    include ($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/header.php");
    ?>



<a href="/delLocations.php">
    <button class="btn btn-danger">
        Tout supprimer
    </button>
</a>


<div class="container"><br>



    <?php 
        $pdo = connectDB();

        $queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location");
        $queryPrepared->execute();
        $results = $queryPrepared->fetchAll();
        $location = $results; 
        


        
                    foreach ($results as $location) {
                        ?>

                        <div class="location-item d-flex justify-content-center">
                            <div id="location-div">
                                <h3 class="location-title"> <?php echo $location['location_title']; ?></h3>
                                <a href="<?php echo "location/" . urlencode($_GET["name"]);?>">
                                    <button class="btn btn-info">Ouvrir</button>
                                </a>
                            </div>
                            <div>
                                <img class="location-img" src="<?php echo $location["location_image"];?>">
                            </div>
                        </div>
        <?php 
            }
            ?>


</div>




<?php
    include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
    ?>