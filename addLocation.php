<?php

    session_start();
    require "functions.php";

    $title = $_POST["location_title"];
    $description = $_POST["location_description"];
    $price = $_POST["euros"];
    $errors = [];
    $locationTitle = $_POST['location_title'];
    $locationLink = "location/" . urlencode($locationTitle);
    $locationType = $_POST["location_type"];




/***************************************************************************** 
 VERIFICATION SERVICES SUPPLEMENTAIRES
*****************************************************************************/

if(isset($_POST["wifi"])){
    $wifi = $_POST["wifi"];
    $wifiPrice = $_POST["wifi_price"];
    if(empty($wifiPrice)){
        $wifiPrice = 0;
    }
} else {
    $wifi = "2";
}

if(isset($_POST["menage"])){
    $menage = $_POST["menage"];
    $menagePrice = $_POST["menage_price"];
    if(empty($menagePrice)){
        $menagePrice = 0;
    }
} else {
    $menage = "2";
}

if(isset($_POST["food"])){
    $food = $_POST["food"];
    $foodPrice = $_POST["food_price"];
    if(empty($foodPrice)){
        $foodPrice = 0;
    }
} else {
    $food = "2";
}

if(isset($_POST["material"])){
    $material = $_POST["material"];
    $materialPrice = $_POST["material_price"];
    if(empty($materialPrice)){
        $materialPrice = 0;
    }
} else {
    $material = "2";
}

if(isset($_POST["children"])){
    $children = $_POST["children"];
    $childrenPrice = $_POST["children_price"];
    if(empty($childrenPrice)){
        $childrenPrice = 0;
    }
} else {
    $children = "2";    
}



/* VERIFICATION DE L'IMAGE */

    $uploaddir = 'assets/img/locations/';
    $uploadfile = strtolower($uploaddir .basename($_FILES['picture']['name']));
    $picture = $uploadfile;
    move_uploaded_file($_FILES['picture']['tmp_name'], $picture);

    $extension = pathinfo($uploadfile, PATHINFO_EXTENSION);



    if(
        empty($_POST["location_title"]) ||
        empty($_POST["location_description"]) ||
        empty($_POST["euros"]) ||
        empty($_POST["location_type"])||
        ($_POST["euros"] < 1)
    ){
        header("Location: /newLocation.php");
        $errors[] = "Merci de remplir tous les champs";
    } else {

        $pdo = connectDB();

        $queryPrepared = $pdo->prepare("INSERT INTO baudrien_location (
            location_user,
            location_type,
            location_title,
            location_description,
            location_image,
            location_price,
            location_link,
            location_service_menage,
            location_service_wifi,
            location_service_food,
            location_service_children,
            location_service_material,
            menage_price,
            food_price,
            wifi_price,
            material_price,
            children_price
            ) 

        VALUES ( :location_user,
        :location_type,
        :location_title,
        :location_description,
        :location_image,
        :location_price,
        :location_link ,
        :location_service_menage,
        :location_service_wifi,
        :location_service_food,
        :location_service_children,
        :location_service_material,
        :menage_price,
        :food_price,
        :material_price,
        :children_price,
        :wifi_price
        );");

        $queryPrepared->execute([
                                    "location_user"=>$userId,
                                    "location_type"=>$locationType,
                                    "location_title"=>$title,
                                    "location_description"=>$description,
                                    "location_image"=>$picture,
                                    "location_price"=>$price,
                                    "location_link"=>$locationLink,
                                    "location_service_menage"=>$menage,
                                    "location_service_wifi"=>$wifi,
                                    "location_service_food"=>$food,
                                    "location_service_material"=>$material,
                                    "location_service_children"=>$children,
                                    "menage_price"=>$menagePrice,
                                    "food_price"=>$foodPrice,
                                    "material_price"=>$materialPrice,
                                    "wifi_price"=>$wifiPrice,
                                    "children_price"=>$childrenPrice
                                    ]);

    
    }

    header ("Location: ./index.php");

    ?>
