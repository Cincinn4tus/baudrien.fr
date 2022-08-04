<?php 
    $mainTitle = "Accueil";
    include("./assets/templates/header.php");
    ?>



<section id="home">
    <div class="home-content" data-aos="fade-up">
        <h2>Un pique-nique c'est sympathique</h2>
        <p>Avec Baudrien, c'est unique</p>
        <div>
            <a href="#about" class="btn-get-started scrollto">Découvrir</a>
        </div>
    </div>
</section>





    <section id="circuits">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Circuits</h2>
          <p>14 circuits sont disponibles, choisissez celui qui vous fait rêver</p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-12 boxCountry" data-aos="fade-up" data-aos-delay="100" id="canada" >
            <div class="box">
              <h3 class="title"><a href="">Canada</a></h3>
              <p class="description">2 parcours sont disponible pour le Canada, à prix plus qu'avantageux</p>
            </div>
          </div>

          <div class="col-lg-12 boxCountry" data-aos="fade-up" data-aos-delay="200" id="egypte">
            <div class="box">
              <h3 class="title"><a href="">Egypte</a></h3>
              <p class="description">Un très beau pays jonché de monuments histoique à découvrir</p>
            </div>
          </div>

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
    include("./assets/templates/footer.php");
    ?>