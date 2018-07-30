<form action="./includes/treatments/formSubmit.php" method="post" class="form-group">
	<legend class="h4 text-center mb-2">Inscription Client</legend>
	<label for="client_surname">Nom : </label>
	<input class="form-control" id="client_surname" name="client_surname" type="text" placeholder="Paltuvier">
	<label for="client_name">Prénom : </label>
	<input class="form-control" id="client_name" name="client_name" type="text" placeholder="Christophe">
	<label for="client_email">Adresse e-mail : </label>
	<input class="form-control" id="client_email" name="client_email" type="text" placeholder="chat@chat.fr">
	<label for="client_address">Adresse : </label>
	<input class="form-control" id="client_address" name="client_address" type="text" placeholder="27, avenue de l'Ouganda">
	<label for="client_postal">Code postal : </label>
	<input class="form-control" id="client_postal" name="client_postal" type="text" placeholder="05553">
	<label for="client_town">Ville : </label>
	<input class="form-control" id="client_town" name="client_town" type="text" placeholder="Licorneville">
	<label for="client_birthday">Date de naissance : </label>
	<input class="form-control" id="client_birthday" name="client_birthday" type="date" placeholder="le meilleur jour du monde">
	<label for="client_pswd1">Mot de passe : </label>
	<input class="form-control" id="client_pswd1" name="client_pswd1" type="password" placeholder="pass">
	<label for="client_pswd2">Retaper mot de passe : </label>
	<input class="form-control" id="client_pswd2" name="client_pswd2" type="password" placeholder="pass">
	<input type="submit" id="client_suscribe" name="client_suscribe" class="mt-5 btn btn-info float-right" value="Inscription">
</form>