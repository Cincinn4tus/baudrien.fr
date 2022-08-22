<?php

    session_start();
    require "functions.php";
    $mainTitle = "Dashboard";
    ?>




<?php
    if(!isConnected() || isConnected() && $_SESSION['id'] != 1) {
        include("./assets/templates/header.php");
        include("./assets/templates/403.php");
    } else{
        include("./assets/templates/admin_header.php");
    }
?>




  <section id="services" class="services">
    <div class="container">

    <h2>Tableau de bord</h2>

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-filetype-txt"></i></div>
            <h4><a href="">Logs</a></h4>
                <h3>
                    <?php numberOfVisits(); ?>
                </h3>
                    <P>Afficher le journal des logs</P>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-people"></i></div>
            <h4><a href="">Utilisateurs</a></h4>
            <h3>
                <?php numberOfUsers(); ?>
            </h3>
            <p>Gestion des utilisateurs</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-percent"></i></div>
            <h4><a href="">Comptabilité</a></h4>
            <p>Devis, facture,gestion comptable</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-percent"></i></i></div>
            <h4><a href="">Promotion</a></h4>
            <p>Création, suppression et gestion des offres du catalogue</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Réseaux sociaux</a></h4>
            <p>Création et optimisation de votre visibilité sur les réseaux sociaux</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bx bx-shopping-bag"></i></div>
            <h4><a href="">Étiquettes promos</a></h4>
            <p>Un module de création d'étiquettes promotionnelles offert avec votre site web</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->








    <?php
        include("./assets/templates/footer.php");
        ?>