<form action="./includes/treatments/formSubmit.php" method="post" class="form-group">
	<legend class="h4 text-center mb-2">Connexion Client</legend>
	<label for="auth_client_email">Nom : </label>
	<input class="form-control" id="auth_client_email" name="auth_client_email" type="email" placeholder="chat@chat.fr">
	<label for="auth_client_pswd">Retaper mot de passe : </label>
	<input class="form-control" id="auth_client_pswd" name="auth_client_pswd" type="password" placeholder="pass">
	<input type="submit" id="auth_client_check_btn" name="auth_client_check_btn" class="mt-5 btn btn-success float-right" value="Connexion">
</form>