<?php

    session_start();
    require "functions.php";
    $mainTitle = "Créer une offre de location";

    if(!isConnected() || isConnected() && $_SESSION['id'] != 1) {
        include("./assets/templates/header.php");
    } else{
        include("./assets/templates/admin_header.php");
    }


    ?>


    <div class="container">
    <h3> Mettre en ligne un offre de location </h3>
        <form method="POST" action="./addLocation.php" enctype="multipart/form-data">
        
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                            <input type="text" class="form-control" name="location_title" placeholder="Titre de la location" require="required"><br>
                           <div class="form-item">Type de location
                                <select name="location_type" class="dropdown">
                                    <option value="chalet">Chalet</option>
                                    <option value="mobilhome">Mobile Home</option>
                                    <option value="private_place">Emplacement privé</option>
                                </select>
                           </div><br><br>
                           <div>
                                Cochez les services supplémentaires proposés<br><br>
                                <label> <input type="checkbox" name="wifi" id="wifi" value="1"> Wifi </label><br>
                                <label> <input type="checkbox" name="menage" id="menage" value="1"> Ménage en fin de séjour </label><br>
                                <label> <input type="checkbox" name="food" id="food" value="1"> Pension alimentaire </label><br>
                                <label> <input type="checkbox" name="material" id="material" value="1"> Matériel de prêt </label><br>
                                <label> <input type="checkbox" name="children" id="children" value="1"> Aménagements pour enfants </label><br>
                            </div>

                           <BR></BR>
                            <textarea class="form-control" name="location_description" id="" placeholder="Description" rows="10"></textarea><br>

                            <input type="file" class="form-control" id="picture" name="picture"><br>
                            <input type="number" class="form-control" name="euros">€
                            <input type="submit" class="btn btn-danger mb-4 mt-4 submitButton" value="Mettre en ligne">
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php
    include("./assets/templates/footer.php");
    ?>