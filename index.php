<?php

    session_start();
    require "./functions.php";
    $mainTitle = "Accueil";
    include ($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/header.php");
    ?>





<section id="home">
    <div class="home-content" data-aos="fade-up">
        <h2>Un pique-nique c'est sympathique</h2>
        <p>Avec Baudrien, c'est unique</p>
        <div>
            <a href="/catalog.php" class="btn-get-started scrollto">Découvrir</a>
        </div>
    </div>
</section>






    <section id="circuits">
      <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
          <h2>Campings thématiques</h2>
          <p>Un voyage sur-mesure, au coeur de la nature</p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-12 boxCountry" data-aos="fade-up" data-aos-delay="100" id="sport">
            <div class="box">
              <h3 class="title"><a href="">Sport</a></h3>
              <p class="description">Randonnée, sports d'endurance ou encore boxe, le choix s'offre à vous</p>
            </div>
          </div>

          <div class="col-lg-12 boxCountry" data-aos="fade-up" data-aos-delay="200" id="nature">
            <div class="box">
              <h3 class="title"><a href="">Botanique</a></h3>
              <p class="description">Avec un expert, allez à la rencontre de ce que la nature vous offre</p>
            </div>
          </div>

          <section id="newsletter">
      <div class="container" data-aos="zoom-out">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h2 class="cta-title">Newsletter</h2>
            <p class="cta-text">Envie de découvrir, de renouer avec la nature ? ne ratez pas les prochaines promotions
              et restez informé sur toutes nos offres !
            </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Je m'inscris !</a>
          </div>
        </div>
      </div>
    </section>


          <div class="col-lg-12 boxCountry" data-aos="fade-up" data-aos-delay="300" id="kenya">
            <div class="box">
              <h3 class="title"><a href="">Kenya</a></h3>
              <p class="description">Une destination mythique, idéale pour s'immerger dans une nouvelle culture</p>
            </div>
          </div>

          <div class="col-lg-12 boxCountry" data-aos="fade-up" data-aos-delay="400" id="usa">
            <div class="box">
              <h3 class="title"><a href="">Etats-Unis</a></h3>
              <p class="description">C'est LA destination qu'il ne faut pas rater !</p>
            </div>
          </div>
          </div>
        </div>

      </div>
    </section>









<?php
    include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
    ?>