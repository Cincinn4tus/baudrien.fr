<?php

session_start();
require "functions.php";

//Email OK
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$errors[] = "Email incorrect";
}else{

	//Vérification l'unicité de l'email
	$pdo = connectDB();
	$queryPrepared = $pdo->prepare("SELECT id from baudrien_user WHERE email=:email");

	$queryPrepared->execute(["email"=>$email]);
	
	if(!empty($queryPrepared->fetch())){
		$errors[] = "L'email existe déjà en bdd";
	}


}

$uploaddir = '/assets/img/users/';
$uploadfile = trim(strtolower($uploaddir .basename($_FILES['user_avatar']['name'])));
$picture = $uploadfile;
move_uploaded_file($_FILES['user_avatar']['tmp_name'], $picture);

$extension = pathinfo($uploadfile, PATHINFO_EXTENSION);


$pdo = connectDB();
            $queryPrepared = $pdo->prepare("UPDATE baudrien_user SET user_avatar = :user_avatar WHERE id = $userId ");

            $queryPrepared->execute([
                'user_avatar' => $picture
            ]);


$queryPrepared->execute(["user_avatar"=>$picture]);

header ("Location:/index.php");


?>