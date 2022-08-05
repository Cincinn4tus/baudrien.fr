<?php
    $mainTitle = "Inscription";
    include("../assets/templates/header.php");
    ?>





<div class="container">
	<div class="row mt-4">
		<div class="col-md-3"></div>
			<div class="col-md-6">
				


				<form method="POST" action="addUser.php">
					<input type="email" class="form-control" name="email" placeholder="Votre email" required="required"><br>

					<input type="text" class="form-control" name="firstname" placeholder="Votre prénom"><br>
					<input type="text" class="form-control" name="lastname" placeholder="Votre nom"><br>
					<input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo"  required="required"><br>

					<input type="date" class="form-control" name="birthday" placeholder="Votre date de naissance"><br>

					<input type="password" class="form-control" name="password" placeholder="Votre mot de passe"  required="required"><br>
					<input type="password" class="form-control" name="passwordConfirm" placeholder="confirmation" required="required"><br>

					<input type="checkbox" name="cgu"  required="required"> CGU <br>

					<input type="submit" class="btn btn-primary" value="S'inscrire">

				</form>
			</div>
	</div>
</div>










<?php
    include("../assets/templates/footer.php");
    ?>