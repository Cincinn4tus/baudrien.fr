<?php 



if (isConnected()) {
$pdo = connectDB();

$queryPrepared = $pdo->prepare("SELECT * FROM baudrien_user");
$queryPrepared->execute();
$results = $queryPrepared->fetchAll();
?>

<div id="user-array">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Création</th>
                <th>Mise à jour</th>
                <th>Actions</th>
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
                        <td>'.$user["date_inserted"].'</td>
                        <td>'.$user["date_updated"].'</td>
                        <td>

                            <div class="btn-group">
                                <a href="delUser.php?id='.$user["id"].'" class="btn btn-danger">Supprimer</a>
                                <a href="#" class="btn btn-warning" >Modifier</a>
                            </div>
                        </td>
                    </tr>';
            }


            ?>

                                

        </tbody>
    </table>
</div>

<?php
}


?>