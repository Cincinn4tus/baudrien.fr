<?php

    session_start();
    require "functions.php";
    $mainTitle = "Créer une offre de location";

    if(!isConnected() || isConnected() && $_SESSION['id'] != 1) {
        include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/header.php");
    } else{
        include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/admin_header.php");
    }


    ?>


    <div class="container">
    <h3> Mettre en ligne un offre de location </h3>
        <form method="POST" action="/addLocation.php" enctype="multipart/form-data">
        
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
                                    Cochez les services supplémentaires souhaités<br><br>
                                    <label> <input type="checkbox" name="wifi" id="wifi" value="1"> Wifi <input type="number" step="0.01" name="wifi_price" placeholder="prix du service (total)">€</label><br>
                                    <label> <input type="checkbox" name="menage" id="menage" value="1"> Ménage en fin de séjour <input type="number" step="0.01" name="menage_price" placeholder="prix (par semaine)">€</label><br>
                                    <label> <input type="checkbox" name="food" id="food" value="1"> Pension alimentaire <input type="number" step="0.01" name="food_price" placeholder="prix du service (total)">€</label><br>
                                    <label> <input type="checkbox" name="material" id="material" value="1"> Matériel de prêt <input type="number" step="0.01" name="material_price" placeholder="prix du service (total)">€</label><br>
                                    <label> <input type="checkbox" name="children" id="children" value="1"> Aménagements pour enfants <input type="number" step="0.01" name="children_price" placeholder="prix du service (total)">€</label><br>
                                </div>

                           <BR></BR>
                            <textarea class="form-control" name="location_description" id="" placeholder="Description" rows="10"></textarea><br>

                            <input type="file" class="form-control" id="picture" name="picture"><br>
                            <input type="number" class="form-control" step="0.01" name="euros">€
                            <input type="submit" class="btn btn-danger mb-4 mt-4 submitButton" value="Mettre en ligne">
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php
    include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
    ?>