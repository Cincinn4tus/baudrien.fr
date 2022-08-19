<?php 
	session_start();
	require "functions.php";
    $mainTitle = "Destinations";
    include("./assets/templates/header.php");
    ?>






<div class="container">

    <nav class="row">

    <div id="search-navbar">
            <a href="./delLocations.php">
                <button class="btn btn-danger">
                    Tout supprimer
                </button>
            </a>


            <h3>Liste des locations</h3><br>

            <div>
                <i class="bi bi-sliders"></i> Filtres
            </div>



    </div>




    <?php 
        $pdo = connectDB();

        $queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location");
        $queryPrepared->execute();
        $results = $queryPrepared->fetchAll();
        $location = $results;


        
                    foreach ($results as $location) {
                        ?>

                        <div class="location-item d-flex justify-content-center">
                            <h3 class="location-title"> <?php echo $location['location_title']; ?></h3>
                            <img class="location-img" src="<?php echo $location["location_image"];?>">
                            <a href="<?php echo $location['location_link'];?>">
                                <button class="btn btn-info">Ouvrir</button>
                            </a>
                        </div>
        <?php 
            }
            ?>


</div>




<?php
    include("./assets/templates/footer.php");
    ?>