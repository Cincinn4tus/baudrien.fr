<?php
session_start();
require "functions.php";

$link = "location/" . urlencode($_GET["name"]);




$pdo = connectDB();
$queryPrepared = $pdo->prepare("SELECT * FROM baudrien_location WHERE location_link='$link'");	
$queryPrepared->execute();
$location = $queryPrepared->fetch();



$description = $location["location_description"];
$price = $location["location_price"];
$wifi = $location["location_service_wifi"];
$material = $location["location_service_material"];
$children = $location["location_service_children"];
$menage = $location["location_service_menage"];
$food = $location["location_service_food"];
$type = $location["location_type"];

$_SESSION['locationId'] = $location["location_id"];
$_SESSION["location_user"] = $location["location_user"];


$mainTitle = $location["location_title"];

include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/header.php");
?>


<section id="location-services" class="services">
    <div class="container">

    <h2 class="location-title"> <?php echo $location["location_title"]; ?> </h2>
    <img id="location-page-img" src="<?php echo $location["location_image"]; ?> " alt="">

    <h3> Description </h3>

    <p>
        <?php echo $description; ?>
    </p>



    <!-----------------------------------
    LOCATION SERVICES
    ------------------------------------>

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-house-door-fill"></i></div>
            <h4><a href=""> 
              <?php 
                switch($type){
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
              
              ?> 
          </a></h4>
            <P> <?php echo $location["location_price"] . "€ par semaine"; ?></P>
          </div>
        </div>

    <?php if($material == 1){ ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-box"></i></div>
            <h4><a href="">Matériel mis à disposition</a></h4>
            <p>
              <?php if($location["material_price"] == 0){
                echo "Offert";
              } else {
                echo $location["material_price"] . "€";
              }
              ?>
            </p>
          </div>
        </div>
    <?php } ?>

    <?php if($menage == 1) { ?>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-percent"></i></div>
            <h4><a href="">Ménage en fin de séjour</a></h4>
            <p>
              <?php if($location["menage_price"] == 0){
                echo "Offert";
              } else {
                echo $location["menage_price"] . "€";
              }
              ?>
            </p>
          </div>
        </div>
    <?php } ?>

    <?php if($children == 1) { ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-people"></i></i></div>
            <h4><a href="">Espace aménagé pour enfants</a></h4>
            <p>
              <?php if($location["children_price"] == 0){
                echo "Offert";
              } else {
                echo $location["children_price"] . "€";
              }
              ?>
            </p>
          </div>
        </div>
    <?php } ?>

    <?php if($food == 1) { ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Pension alimentaire</a></h4>
            <p>
              <?php if($location["food_price"] == 0){
                echo "Offert";
              } else {
                echo $location["food_price"] . "€ par semaine";
              }
              ?>
            </p>
          </div>
        </div>
    <?php } ?>

    <?php if($wifi == 1) { ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box col-lg-12">
          <div class="icon"><i class="bi bi-wifi"></i></div>
            <h4><a href="">Connexion internet</a></h4>
            <p>
              <?php if($location["wifi_price"] == 0){
                echo "Offert";
              } else {
                echo $location["wifi_price"] . "€";
              }
              ?>
            </p>
          </div>
        </div>
    <?php } ?>


      </div>

    </div>
  </section>





  <section id="rent-btn" class="button">
    <div> 
      <a href="/rentLocation.php">
        <button class="btn btn-danger">
          Réserver un séjour
        </button>
      </a>
    </div>
  </section>
  </form>


  <section class="button">
    <h3>Besoin de renseignements ?</h3>
    <a href="/newConversation.php">
      <button class="btn btn-info">
        Contacter le vendeur
      </button>
    </a>
  </section>


 
  <?php include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
    ?>
