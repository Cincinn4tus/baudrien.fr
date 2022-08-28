<?php

    session_start();
    require "functions.php";
    $mainTitle = "Dashboard";
    ?>




<?php
    if($_SESSION['id'] != 1) {
        include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/header.php");
        include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/403.php");
    } else{
        include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/admin_header.php");

?>





	<h3>Liste des utilisateurs</h3>

        

        <input type="text" id="pseudo" name="pseudo" placeholder="Saisir le pseudo" onkeyup="getdata();">


        <div id="all-users">
            <a href="/users.php">
                <button class="btn btn-info">
                    Tout afficher
                </button>
            </a>
        </div>



        <div id="results">

            <?php 
                if(!isset($_GET["pseudo"])); {
                    include($_SERVER['DOCUMENT_ROOT'] ."/userArray.php");
                }
            ?>


        </div>







<?php 
     }
     include ($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
     ?>