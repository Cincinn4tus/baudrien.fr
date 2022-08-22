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





	<h3>Liste des utilisateurs</h3>

        

        <input type="text" id="pseudo" name="pseudo" placeholder="Saisir le pseudo" onkeyup="getdata();">


        <div id="all-users">
            <a href="./users.php">
                <button class="btn btn-info">
                    Tout afficher
                </button>
            </a>
        </div>



        <div id="results">

            <?php 
                if(!isset($_GET["pseudo"])); {
                    include("./userArray.php");
                }
            ?>


        </div>







<?php include ("./assets/templates/footer.php");?>