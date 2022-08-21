<?php
	session_start();
	require "functions.php";
?>
			<?php

				if( !empty($_POST['email']) &&  !empty($_POST['pwd']) && count($_POST)==2 ){

					//Récupérer en bdd le mot de passe hashé pour l'email provenant du formulaire


					$pdo = connectDB();
					$queryPrepared = $pdo->prepare("SELECT * FROM baudrien_user WHERE email=:email");
					$queryPrepared->execute(["email"=>$_POST['email']]);
					$results = $queryPrepared->fetch();

					if(!empty($results) && password_verify($_POST['pwd'], $results['pwd'])){
						

						$token = createToken();
						updateToken($results["id"], $token);

						//Insertion dans la session du token
                        
                        $_SESSION['pseudo'] = $results["pseudo"];
						$_SESSION['email'] = $_POST['email'];
						$_SESSION['id'] = $results["id"];
						$_SESSION['token'] = $token;


                        if($_SESSION['id'] == 1) {


						header("location: ./admin.php");

                        } else {
                            header("Location: ./index.php");
                        }

					}else{
						echo "Identifiants incorrects";
					}

				}

			?>
