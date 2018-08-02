<form action="./includes/treatments/formSubmit.php" method="post" class="form-group">
	<legend class="h4 text-center mb-2">Connexion Employe</legend>
	<label for="auth_employe_email">E-mail : </label>
	<input class="form-control" id="auth_employe_email" name="auth_employe_email" type="email" placeholder="chat@chat.fr">
	<label for="auth_employe_secu">n°secu : </label>
	<input class="form-control" id="auth_employe_secu" name="auth_employe_secu" type="number" placeholder="111">
	<input type="submit" id="auth_employe_check_btn" name="auth_employe_check_btn" class="mt-5 btn btn-danger float-right" value="Connexion">
</form>