<?php

    session_start();
    require "functions.php";
    $mainTitle = "Profil";

    if(!isConnected() || isConnected() && $_SESSION['id'] != 1) {
        include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/header.php");
    } else{
        include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/admin_header.php");
	}
    ?>

	<div class="container-fluid">
		<div class="row">
			<img class="avatar-img" id="profile-avatar" src="<?php echo $avatar; ?>" alt="avatar" data-bs-toggle="dropdown">
		</div>

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


				<h3>Modifier mon profil</h3>

				<form method="POST" action="/modifyUser.php" required="required" enctype="multipart/form-data">

				Changer la photo de profil<input type="file" class="form-control" id="picture" name="user_avatar"><br>


					<select name="user_role" class="form-control" disabled="disabled">
						<option value="1">Je cherche un camping</option>
						<option value="2">Je loue un camping</option>
					</select><br>


					<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required="required"><br>

					<input role="text" class="form-control" disabled="disabled" name="firstname" value="<?php echo $userInformations['firstname'];?>"><br>
					<input type="text" class="form-control" name="lastname" disabled="disabled" value="<?php echo $userInformations['lastname']; ?>"><br>
					<input type="text" class="form-control" disabled="disabled" name="pseudo" value="<?php echo $pseudo; ?>"  required="required"><br>

					<input type="date" class="form-control" name="birthday" disabled="disabled" value="<?php echo $userInformations["birthday"];?>"><br>

					<input type="password" class="form-control" name="password" placeholder="Nouveau mot de passe"  required="required"><br>
					<input type="password" class="form-control" name="passwordConfirm" placeholder="confirmation" required="required"><br>

					<select name="country" class="form-control" disabled="disabled">
						<option value="fr">France</option>
						<option value="pl">Pologne</option>
						<option value="ml">Mali</option>
					</select>


					<input type="submit" class="btn btn-primary" value="Enregistrer">

				</form>
			</div>
		</div>
	</div><br>



</div>

<?php
        include($_SERVER['DOCUMENT_ROOT'] ."/assets/templates/footer.php");
    ?>

