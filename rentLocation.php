<?php

    session_start();
    require "functions.php";

    $locationId = $_SESSION["locationId"];

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location WHERE location_id='$locationId'");
    $queryPrepared->execute();
    $location = $queryPrepared->fetch();


    $mainTitle = $location["location_title"];



    include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/header.php");

    if($location["wifi_price"] == 0){
        $wifiPrice = "Offert";
    } else {
        $wifiPrice = $location["wifi_price"] . "€";
    }

    if($location["menage_price"] == 0){
        $menagePrice = "Offert";
    } else {
        $menagePrice = $location["menage_price"] . "€";
    }

    if($location["food_price"] == 0){
        $foodPrice = "Offert";
    } else {
        $foodPrice = $location["food_price"] . "€ par semaine";
    }
    if($location["material_price"] == 0){
        $materialPrice = "Offert";
    } else {
        $materialPrice = $location["wifi_price"] . "€";
    }

    if($location["children_price"] == 0){
        $childrenPrice = "Offert";
    } else {
        $childrenPrice = $location["children_price"] . "€";
    }

?>


<h1><?php echo $location["location_title"];?></h1>

<h3>Réservation</h3>

<?php echo $locationDayPrice; ?>


<div class="error-div">
<?php
				if(!empty($_SESSION['errors'])){ ?>
                    <h3 class="error-title">Erreur</h3>
                    <?php
					foreach($_SESSION["errors"] as $error){
                        ?>
                    <li> <?php echo $error; ?> </li>
                <?php
                    }
					unset($_SESSION['errors']);
				}
                ?>
                </div>

<form method="POST" action="/verifyRent.php">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                            <div class="rent-dates">
                                <div>
                                    Réserver du <input type="date" name="firstday" class="form-control" required="required">
                                    Au <input type="date" name="lastday" class="form-control" required="required">
                                </div>
                            </div>
                            <div>
                                <?php

                                if(
                                    $location["location_service_wifi"] == 1 ||
                                    $location["location_service_menage"] == 1 ||
                                    $location["location_service_food"] == 1 ||
                                    $location["location_service_material"] == 1 ||
                                    $location["location_service_children"] == 1
                                ) {
                                    echo 'Cochez les services supplémentaires souhaités<br><br>';
                                     }
                                if($location["location_service_wifi"] == 1){
                                    echo '<label> <input type="checkbox" name="wifi" id="wifi" value="1"> Accès au wifi (' . $wifiPrice .')</label><br>';
                                }
                                if($location["location_service_menage"] == 1){
                                    echo '<label> <input type="checkbox" name="menage" id="menage" value="1"> Ménage en fin de séjour ('. $menagePrice.')</label><br>';
                                }
                                if($location["location_service_food"] == 1){
                                    echo '<label> <input type="checkbox" name="food" id="food" value="1"> Pension alimentaire ('. $foodPrice.')</label><br>';
                                }
                                if($location["location_service_material"] == 1){
                                    echo '<label> <input type="checkbox" name="material" id="material" value="1"> Matériel de prêt ('. $materialPrice.') </label><br>';
                                }
                                if($location["location_service_children"] == 1){
                                    echo '<label> <input type="checkbox" name="children" id="children" value="1"> Aménagements pour enfants ('. $childrenPrice.') </label><br>';
                                }
                                ?>

            
                            </div>

                       <BR></BR>

                        <input type="submit" class="btn btn-danger mb-4 mt-4 submitButton" value="Commander">
                </div>
            </div>
        </div>
    </form>



        <?php





/* 

POUR CALCULER LE PRIX TOTAL :

DIVISER LE PRIX SEMAINE PAR 7 (POUR OBTENIR PRIX JOURNEE) PUIS LE MULTIPLIER PAR LE NOMBRE DE JOUR + ARRONDIR A UNE JOURNEE ENTIERE SI JOUR ENTAMEE 

PAR EXEMPLE, JUSQU'AU MERCREDI MATIN 8H, COMPTER JUSQUA MERCREDI 23H59
*/

?>







<?php
    include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
    ?>