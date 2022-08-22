<?php

session_start();
require "functions.php";

$locationId = $_SESSION["locationId"];

$pdo = connectDB();
$queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location WHERE location_id='$locationId'");	
$queryPrepared->execute();
$location = $queryPrepared->fetch();


$mainTitle = "Réservation d'un séjour";

include("./assets/templates/header.php");

?>


<h1><?php echo $location["location_title"];?></h1>

<h3>Réservation</h3>


            <?php echo $location["location_price"];?>€ <br>

            <?php 

            $dayprice = $location["location_price"] / 7;
            echo $dayprice;
            ?>



<form method="POST" action="./verifyRent.php">
        
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="rent-dates">
                        <div>
                            Réserver du <input type="date" name="firstday" class="form-control" required="required">
                        </div>
                        <div>
                            Au <input type="date" name="lastday" class="form-control" required="required">
                        </div>
                    </div>
                            <div>
                                Cochez les services supplémentaires souhaités<br><br>
                                <label> <input type="checkbox" name="wifi" id="wifi" value="1"> Accès au wifi </label><br>
                                <label> <input type="checkbox" name="menage" id="menage" value="1"> Ménage en fin de séjour </label><br>
                                <label> <input type="checkbox" name="food" id="food" value="1"> Pension alimentaire </label><br>
                                <label> <input type="checkbox" name="material" id="material" value="1"> Matériel de prêt </label><br>
                                <label> <input type="checkbox" name="children" id="children" value="1"> Aménagements pour enfants </label><br>
                            </div>

                       <BR></BR>

                        <input type="number" class="form-control" step="0.01" name="euros">€
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
    include("./assets/templates/footer.php");
    ?>