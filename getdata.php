<?php
    session_start();
    require "functions.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $pseudo = $_GET["pseudo"];
    if($pseudo == NULL){
        $data = "SELECT * FROM baudrien_user";   
    } else {
        $data = "SELECT * FROM baudrien_user WHERE pseudo LIKE '$pseudo%'";
    }


        $pdo = connectDB();
		$queryPrepared = $pdo->prepare($data);
		$queryPrepared->execute();
		$results = $queryPrepared->fetchAll();
    ?>

        <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Pseudo</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    foreach ($results as $user) {
                        echo '<tr>
                                <td>'.$user["id"].'</td>
                                <td>'.$user["lastname"].'</td>
                                <td>'.$user["firstname"].'</td>
                                <td>'.$user["pseudo"].'</td>
                                <td>'.$user["email"].'</td>
                                <td>'.($user["date_inserted"]??'never').'</td>
                                <td>'.($user["date_updated"]??'never').'</td>
                                <td>

                                    <div class="btn-group">
                                        <a href="delUser.php?id='.$user["id"].'" class="btn btn-danger">Supprimer</a>
                                        <a href="#" class="btn btn-warning" >Modifier</a>
                                    </div>
                                </td>
                            </tr>';
                    }


                    ?>
    <?php   


?>