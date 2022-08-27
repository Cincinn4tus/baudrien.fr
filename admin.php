<?php

    session_start();
    require "functions.php";
    $mainTitle = "Dashboard";
    ?>




<?php
    if(!isConnected() || isConnected() && $_SESSION['id'] != 1) {
        include($_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php");
        include("/assets/templates/403.php");
    } else{
        include($_SERVER['DOCUMENT_ROOT'] . "/assets/templates/admin_header.php");

?>

    

<?php

    echo date('H:i:s',time());

}

    ?>






<?php
    include("/assets/templates/footer.php");
    ?>