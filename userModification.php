<?php 



if (isConnected()) {
$pdo = connectDB();

$queryPrepared = $pdo->prepare("SELECT * FROM baudrien_user");
$queryPrepared->execute();
$results = $queryPrepared->fetchAll();
$_SESSION["id"] = "id";

include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/admin_header.php");
?>


<?php
}

include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");

?>