<?php

    session_start();
    require "functions.php";
    $mainTitle = "Dashboard";
    ?>




<?php
  if(!isConnected() || $role != 1) {
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php");
    include ("./assets/errors/403.html");
  } else {
    include($_SERVER['DOCUMENT_ROOT'] . "/assets/templates/admin_header.php");
?>



  <section id="services" class="services">
    <div class="container">

    <h2>Tableau de bord</h2>

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-filetype-txt"></i></div>
            <h4><a href="./log.php">Logs</a></h4>
                <h3>
                    <?php numberOfVisits(); ?>
                </h3>
                    <P>(Logs en temps réel)</P>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box col-lg-12">
            <div class="icon"><i class="bi bi-people"></i></div>
            <h4><a href="./users.php">Utilisateurs</a></h4>
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
            <h4><a href="">Newsletter</a></h4>
            <p>Un module de création d'étiquettes promotionnelles offert avec votre site web</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->








    <?php
  }
        include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
        ?>