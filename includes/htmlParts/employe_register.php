<form action="./includes/treatments/formSubmit.php" method="post" class="form-group">
	<legend class="h4 text-center mb-2">Inscription Employé</legend>
	<label for="employe_surname">Nom : </label>
	<input class="form-control" id="employe_surname" name="employe_surname" type="text" placeholder="Smith">
	<label for="employe_name">Prénom : </label>
	<input class="form-control" id="employe_name" name="employe_name" type="text" placeholder="Shia">
	<label for="employe_email">Adresse e-mail : </label>
	<input class="form-control" id="employe_email" name="employe_email" type="text" placeholder="ssmith@costco.com">
	<label for="employe_address">Adresse : </label>
	<input class="form-control" id="employe_address" name="employe_address" type="text" placeholder="27, avenue de l'Ouganda">
	<label for="employe_postal">Code postal : </label>
	<input class="form-control" id="employe_postal" name="employe_postal" type="text" placeholder="05553">
	<label for="employe_town">Ville : </label>
	<input class="form-control" id="employe_town" name="employe_town" type="text" placeholder="Licorneville">
	<label for="employe_birthday">Date de naissance : </label>
	<input class="form-control" id="employe_birthday" name="employe_birthday" type="date" placeholder="le meilleur jour du monde">
	<label for="employe_secu">n° de sécurité sociale : </label>
	<input class="form-control" id="employe_secu" name="employe_secu" type="number" placeholder="1 88 00 00 111 111 22">
	<label for="employe_position">Fonction ocupée : </label>
	<select class="form-control" id="employe_position" name="employe_position">
		<option value="Cadre">Cadre</option>
		<option value="Gestionnaire">Gestionnaire</option>
		<option value="Technicien">Technicien</option>
		<option value="Directeur">Directeur</option>
		<option selected value="Employé">Employé</option>
	</select>
	<label for="employe_wages">Salaire : </label>
	<input class="form-control" id="employe_wages" name="employe_wages" type="number" placeholder="1300">
	<label for="employe_boss_id">Supérieur : </label>
	<input class="form-control" id="employe_boss_id" name="employe_boss_id" type="number" placeholder="1">
	<input type="submit" id="employe_suscribe" name="employe_suscribe" class="my-5 btn btn-info float-right" value="Inscription">
</form>