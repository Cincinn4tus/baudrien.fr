
<?php
    session_start();
    require "functions.php";
    $mainTitle = "Location validée";
    include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/header.php");

    $locationId = $_SESSION["locationId"];


?>

<div id="location-validated">
<h3>Votre location a été validée</h3>

Vous pourrez effectuer le paiement sur place par carte bancaire ou en espèces.

</div>



<?php
    include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
    ?>