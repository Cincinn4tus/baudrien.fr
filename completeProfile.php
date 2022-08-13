<?php

    session_start();
    require "functions.php";
    $mainTitle = "Profil";

    if(!isConnected() || isConnected() && $_SESSION['id'] != 1) {
        include("./assets/templates/header.php");
        include("./assets/templates/403.php");
    } else{
        include("./assets/templates/admin_header.php");
    }
    
    ?>

<div class="container-fluid">
    <div class="row">
        <img class="avatar-img" id="profile-avatar" src="./assets/img/avatar.jpeg" alt="avatar" data-bs-toggle="dropdown">
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


			<h3>Modifier mon profil <?php echo $birthay; ?></h3>
			<form method="POST" action="./addUser.php" required="required">


				<select name="user_role" class="form-control">
					<option value="1">Je cherche un camping</option>
					<option value="2">Je loue un camping</option>
				</select>


				<input type="email" class="form-control" name="email" value="<?php echo $email; ?> " required="required"><br>

				<input role="textbox" class="form-control" contenteditable="false" aria-disabled="true" name="firstname" value="<?php echo $userInformations['firstname']; ?>"><br>
				<input type="text" class="form-control" name="lastname" value="<?php echo $userInformations['lastname']; ?> "><br>
				<input type="text" class="form-control" name="pseudo" value="<?php echo $pseudo; ?>"  required="required"><br>

				<input type="date" class="form-control" name="birthday" value=" <?php echo $birthay; ?> "><br>

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



</div>

<?php
        include("./assets/templates/footer.php");
    ?>

