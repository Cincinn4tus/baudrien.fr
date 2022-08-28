
<?php
    session_start();
    require "functions.php";
    $mainTitle = "Résumé de la location";
    include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/header.php");

    $locationId = $_SESSION["locationId"];

    $pdo = connectDB();
    $queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location WHERE location_id='$locationId'");
    $queryPrepared->execute();
    $location = $queryPrepared->fetch();

    $price = $_SESSION["location_price"];
    $foodprice = $_SESSION["food_price"];
    $servicesArray = array($_SESSION["wifi_price"], $_SESSION["material_price"], $_SESSION["food_price"], $_SESSION["menage_price"], $_SESSION["children_price"]);
    $servicesPrice = array_sum($servicesArray);
    $finalPrice = $servicesPrice+$_SESSION["location_price"];
    $_SESSION["rent_price"] = $finalPrice;
    $_SESSION["seller"] = $location["location_user"];
    $_SESSION["rent_buyer"] = $_SESSION["id"];



?>

<h3>Résumé de votre commande</h3>


    <div class="container">
        <div>
            <h4>Location : <?php echo $location["location_title"]; ?></h4>
        
        </div>
       <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Description</th>
                        <th>Prix </th>
                    </tr>
                </thead>
                <tbody>
                        

                            <tr>
                                <td>Location de l'emplacement</td>
                                <td>
                                <?php 
                                  switch($location["location_type"]){
                                    case "chalet":
                                      echo "Chalet";
                                      break;
                                    case "mobilhome":
                                      echo "Mobil'home";
                                      break;
                                    case "private_place":
                                      echo "Emplacement privé";
                                      break;
                                  }
                                    
  
                                echo " - " . $_SESSION["number_of_days"] . " Jours"; ?></td>
                                <td>
                                    <?php 
                                        echo round($_SESSION["location_price"],2) . "€";
                                    ?>
                                </td>
                            </tr>



                        <?php if(isset($_SESSION["wifi_price"])){
                            ?>
                            <tr>
                                <td>Connexion internet</td>
                                <td>Connexion internet durant le séjour</td>
                                <td>
                                    <?php if($_SESSION["wifi_price"] == 0){
                                        echo "Offert";
                                    } else {
                                        echo $_SESSION["wifi_price"] . "€";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>


                        <?php if(isset($_SESSION["menage_price"])){
                            ?>
                            <tr>
                                <td>Ménage</td>
                                <td>Ménage en fin de séjour</td>
                                <td>
                                    <?php if($_SESSION["menage_price"] == 0){
                                        echo "Offert";
                                    } else {
                                        echo $_SESSION["menage_price"] . "€";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if(isset($_SESSION["food_price"])){
                            ?>
                            <tr>
                                <td>Alimentation</td>
                                <td>Repas offert durant le séjour</td>
                                <td>
                                    <?php if($_SESSION["food_price"] == 0){
                                        echo "Offert";
                                    } else {
                                        echo $_SESSION["food_price"] . "€";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if(isset($_SESSION["material_price"])){
                            ?>
                            <tr>
                                <td>Matériel</td>
                                <td>Matériel mis à disposition</td>
                                <td>
                                    <?php if($_SESSION["material_price"] == 0){
                                        echo "Offert";
                                    } else {
                                        echo $_SESSION["material_price"] . "€";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php if(isset($_SESSION["childre_price"])){
                            ?>
                            <tr>
                                <td>Connexion internet</td>
                                <td>Connexion internet durant le séjour</td>
                                <td>
                                    <?php if($_SESSION["children_price"] == 0){
                                        echo "Offert";
                                    } else {
                                        echo $_SESSION["children_price"] . "€";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td>Total - services complémentaires</td>
                        <td></td>
                        <td>
                            <?php echo $servicesPrice . "€"; ?>
                        </td>
                    </tr>
                    <tr class="final-price">
                        <td>Total</td>
                        <td></td>
                        <td> <?php echo round($finalPrice, 2) . "€"; ?> </td>
                    </tr>
                </tfoot>
            </table>
       </div>
    </div>

    <div class="button">
        <a href="./addRent.php">
            <button class="btn btn-danger">
                Valider l'achat
            </button>
        </a>
    </div>

<?php
    include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
    ?>