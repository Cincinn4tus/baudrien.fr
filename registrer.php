<?php

	session_start();
	require $_SERVER['DOCUMENT_ROOT'] .  "/functions.php";
	$mainTitle = "Inscription";
	include ($_SERVER['DOCUMENT_ROOT'] . "/assets/templates/header.php");
	?>


<div class="container-fluid">
	<div class="row mt-4">
		<div id="register-form" class="col-md-4">
			<?php
				if(!empty($_SESSION['errors'])){
					print_r( $_SESSION['errors'] );
					unset($_SESSION['errors']);
					//session_destroy();
				}
			?>


			<h3>Inscription</h3>
			<form method="POST" action="./addUser.php" required="required">


				<select name="user_role" class="form-control">
					<option value="2">Je cherche un camping</option>
					<option value="3">Je loue un camping</option>
				</select><br>


				<input type="email" class="form-control" name="email" placeholder="Votre email" required="required"><br>

				<input type="text" class="form-control" name="firstname" placeholder="Votre prénom"><br>
				<input type="text" class="form-control" name="lastname" placeholder="Votre nom"><br>
				<input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo"  required="required"><br>

				<input type="date" class="form-control" name="birthday" placeholder="Votre date de naissance"><br>

				<input type="password" class="form-control" name="password" placeholder="Votre mot de passe"  required="required"><br>
				<input type="password" class="form-control" name="passwordConfirm" placeholder="confirmation" required="required"><br>

				<select name="country" class="form-control">
					<option value="fr">France</option>
					<option value="pl">Pologne</option>
					<option value="ml">Mali</option>
				</select>

				<input type="checkbox" name="cgu"  required="required"> CGU <br>

				<input type="submit" class="btn btn-primary" value="S'inscrire">

			</form>
		</div>
	</div>
</div>

<?php include ($_SERVER['DOCUMENT_ROOT'] . "/assets/templates/footer.php");?>
